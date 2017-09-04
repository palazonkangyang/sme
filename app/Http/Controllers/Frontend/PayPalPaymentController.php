<?php

namespace SME\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use SME\Http\Models\PassengerBooking;
use SME\Http\Models\Masters\Price;
use SME\Http\Models\Masters\TicketBundle;
use Netshell\Paypal\Facades\Paypal;


class PayPalPaymentController extends FrontendController
{

    private $_apiContext;

    public function __construct()
    {
        parent::__construct();

        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 500,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'DEBUG'
        ));
    }

    public function getPaymentProcess($id)
    {

        $booking = PassengerBooking::findOrFail($id);

        /* if total cost if zero proceed to summery page */

        if ($booking->getTotalCost() < 1) {

            $booking->getTransaction()->create([
                "trans_id" => uniqid("TRANS"),
                "amount" => 0,
                "type" => 1,
            ]);

            $this->sendBookingConfirmation($booking);
            return redirect()->route("frontend.ticketing.summery", [$booking->id]);
        }

        $ticket_cost = $booking->total_price;

        $addr = PayPal::address();
        $addr->setLine1($booking->address);
        $addr->setLine2("");
        $addr->setCity("");
        $addr->setState("");
        $addr->setPostalCode("");
        $addr->setCountryCode($booking->getCountry->code);
        $addr->setPhone($booking->contact_no);

        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $items = [];

        $item1 = PayPal::item();
        $item1->setName($booking->ticket_no)
            ->setDescription('Ticket')
            ->setCurrency('SGD')
            ->setQuantity(1)
            ->setTax(0)
            ->setPrice($ticket_cost);

        $items[] = $item1;

        
        
        $itemList = PayPal::itemList();
        $itemList->setItems($items);

        $details = PayPal::details();
        $details->setShipping("0")
            ->setTax("0")
            ->setSubtotal($booking->getTotalCost());

        //Payment Amount
        $amount = PayPal::amount();
        $amount->setCurrency("SGD")
            ->setTotal($booking->getTotalCost())
            ->setDetails($details);

        $transaction = PayPal::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(route("frontend.payment.done", [$id]));
        $redirectUrls->setCancelUrl(route("frontend.payment.cancelled", [$id]));

        $payment = PayPal::Payment();

        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        return redirect()->to($redirectUrl);
    }

    private function sendBookingConfirmation($booking)
    {
        $this->data["booking"] = $booking;
        if (!$this->data["booking"]->getTransaction) {
            throw new NotFoundHttpException();
        }

        $this->data["bundle_product"] = TicketBundle::where("ticket_id",'=', $this->data["booking"] ->id)->join("master_bundles as pt", "pt.id", "=", "bundle_id")->get()->all();
        $this->data["discount"] = TicketBundle::where("ticket_id",'=', $this->data["booking"] ->id)->where("bundle_id","=","3")->first();
        $dw = date( "l", strtotime($this->data["booking"]->date));
        $this->data["price"] = Price::where("name",'=', $dw)->first();
        /* Create temp PDF */
        $file = \PDF::loadView('email.ticket.confirmation', $this->data)->stream();

        \Mail::send("email.ticket.confirmation1", $this->data, function ($message) use ($booking, $file) {
            $message->to($booking->email, $booking->getName())
                ->from("bookings@SME.com", "Makan Bus")
                ->subject("Your ticket information for ticket no {$booking->ticket_no}")
                ->attach(storage_path("docs/locations.pdf"))
                ->attachData($file, "booking-{$booking->ticket_no}.pdf");
        });
    }

    public function getDone(Request $request, $booking_id)
    {
        $booking = PassengerBooking::findOrFail($booking_id);


        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = PayPal::getById($id, $this->_apiContext);

        try {
            $paymentExecution = PayPal::PaymentExecution();

            $paymentExecution->setPayerId($payer_id);
            $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

            $booking->getTransaction()->create([
                "trans_id" => $executePayment->getId(),
                "amount" => $executePayment->getTransactions()[0]->getAmount()->getTotal(),
                "type" => 1,
            ]);

            $this->sendBookingConfirmation($booking);
            return redirect()->route("frontend.ticketing.summery", [$booking_id]);

        } catch (\Exception $ex) {

            $message = $ex->getMessage();

            if (method_exists($ex, "getData")) {
                $data = json_decode($ex->getData(), TRUE);
                $message = $data["message"];
            }

            return redirect()->route("frontend.ticketing", $id)->with("paymentError", [
                "message" => $message
            ])->withInput($request->all());
        }
    }

    public function getCancel(Request $request, $booking_id)
    {

        $this->data["page_title"] = "Payment Failed";
        $this->data["page_sub_title"] = "";
        $this->data["button"] = FALSE;


        return $this->View('template.payment.cancel');
    }


}
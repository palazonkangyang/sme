<?php

namespace SME\Http\Controllers\Buyer;
use Auth;
use Illuminate\Http\Request;
use SME\Http\Models\SubscriptionPackage;
use SME\Http\Models\BuyerPackage;
use SME\Http\Models\Buyer;
use SME\Http\Models\Masters\TicketBundle;
use Netshell\Paypal\Facades\Paypal;


class PayPalPaymentController extends BuyerController
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

    public function getPaymentProcess($id,$b_id)
    {

        $booking = Buyer::findOrFail($b_id);
        $ticket = SubscriptionPackage::findOrFail($id);

        /* if total cost if zero proceed to summery page */

        if ($ticket->subscription_price < 1) {
            $buyer = Auth::buyer()->user();
            $values['package_id'] = $id;
            $buyer->update($values);
            $values['buyer_id'] = $buyer->id;
        
        $buyer_package = BuyerPackage::create($values);
             return redirect()
            ->route("buyer.auth.profile.edit")
            ->with("alert", [
                "success" => TRUE,
                "message" => "Your profile has been successfully updated!"
            ]);
        }

        $ticket_cost = $ticket->subscription_price;

        $addr = PayPal::address();
        $addr->setLine1($booking->address);
        $addr->setLine2("");
        $addr->setCity("");
        $addr->setState("");
        $addr->setPostalCode("");
        $addr->setCountryCode($booking->postal_code);
        $addr->setPhone($booking->contact_no);

        $payer = PayPal::Payer();
        
        $payer->setPaymentMethod('paypal');

        $items = [];

        $item1 = PayPal::item();
        $item1->setName($booking->name)
            ->setDescription($booking->company_name)
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
            ->setSubtotal($ticket_cost);

        //Payment Amount
        $amount = PayPal::amount();
        $amount->setCurrency("SGD")
            ->setTotal($ticket_cost)
            ->setDetails($details);

        $transaction = PayPal::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(route("buyer.auth.payment.done", [$booking->id]));
        $redirectUrls->setCancelUrl(route("buyer.auth.payment.cancelled", [$booking->id]));

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
        $this->data["packages"] = SubscriptionPackage::findOrFail($booking->package_id);
        $packages =SubscriptionPackage::findOrFail($booking->package_id);
        

        \Mail::send("email.ticket.confirmation1", $this->data, function ($message) use ($booking) {
            $message->to($booking->email, $booking->name)
                ->from("bookings@sme.com", "SME")
                ->subject("Your Subscription Confirmation");
            });
    }

    public function getDone(Request $request, $booking_id)
    {
        $booking = Buyer::findOrFail($booking_id);
        $values['buyer_id'] = $booking->id;
        $values['package_id'] = $booking->package_id;
         $buyer_package = BuyerPackage::create($values);
        $this->sendBookingConfirmation($booking);
        return redirect()
            ->route("buyer.auth.profile.edit")
            ->with("alert", [
                "success" => TRUE,
                "message" => "You have successfully subscribed for the package!"
            ]);

        
       
            
            
    }

    public function getCancel(Request $request, $booking_id)
    {
        $booking = Buyer::findOrFail($booking_id);
        $package = BuyerPackage::where('buyer_id','=',$booking_id)->orderby('updated_at','desc')->first();
        
        if($package == null )
        {
            $values['package_id'] = "4";
            $booking->update($values);
            
        }
        else
        {
            $values['package_id'] = $package->package_id;
            $booking->update($values);
            
        }
        return redirect()
            ->route("buyer.auth.profile.edit")
            ->with("alert", [
                "success" => FALSE,
                "message" => "You have cancelled the payment!"
            ]);
        
    }


}
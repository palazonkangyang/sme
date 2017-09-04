<?php

namespace SME\Http\Controllers\Frontend;

use Carbon\Carbon;
use SME\Http\Models\Masters\Country;
use SME\Http\Models\PassengerBooking;
use SME\Http\Models\Product;
use SME\Http\Models\Masters\Bundle;
use SME\Http\Models\Masters\TicketBundle;
use SME\Http\Models\Masters\BundleProduct;
use SME\Http\Models\Masters\ProductValue;
use SME\Http\Models\PromoCode;
use SME\Http\Models\Masters\Price;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class TicketingController extends FrontendController
{
    public function getTicket()
    {
        $this->data["page_title"] = "Ticketing";
        $this->data["page_sub_title"] = "";
        $this->data["button"] = FALSE;

        /* Load all products */
        $this->data["products"] = Product::where("status", 1)->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Product", "")
            ->toArray();

        /* Load all Bundles */
        $this->data["bundles"] = Bundle::where("status", 1)->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Bundle", "")
            ->toArray();

        $this->data["countries"] = Country::where("status", 1)
            ->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Country", "")
            ->toArray();

        return $this->View("template.ticketing");
    }


     public function getJSONprice()
    {
        
        $msg = $_GET['day'];
        $msg_1 = $_GET['description'];
        $price = Price::select(["fixed_price","description"])->where("id", $_GET['day'])->first();
         
     
        return response()->json(array('msg'=> $price->fixed_price,'msg_1'=> $price->description), 200);

    }

    public function getJSONbundle()
    {
        
        $msg_2 = $_GET['bundle'];
        $msg_3 = $_GET['desc'];
        $bundle_plan = Bundle::select(["fixed_price","description"])->where("id", $_GET['bundle'])->first();
         
     
        return response()->json(array('msg_2'=> $bundle_plan->fixed_price,'msg_3'=> $bundle_plan->description), 200);

    }


    public function postTicket(Request $request)
    {
        $rules = [
            "date" => "required|date|after:yesterday|not_in:" . implode(",", $this->data["setting"]->ticket_unavailable),
            "ticket_qty" => "required|numeric|min:1",
            "promo_code" => "exists:promo_codes,promo_code",
            "product" => "exists:products,id",
            "bundle" => "exists:master_bundles,id",
            //"product_qty" => "required_with:product|numeric|min:1",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "contact_no" => "",
            "gender" => "required|in:1,2",
            "email" => "required|email|max:255",
            "address" => "max:255",
            "country" => "required|exists:master_countries,id",
            "how_reach_us.*" => "in:1,2,3,4",
            "agreement" => "required"
        ];

        if ($request->input("product")) {
            $rules["product_qty"] = "required|numeric|min:1";
        }

        $this->validate($request, $rules, [
            "date.not_in" => "Sorry! Ticket is not available on selected date."
        ]);

        if (!empty($request->input("promo_code"))) {

            /* Validate additional values of promo code */
            $promo = PromoCode::select(["discount", "volume"])->where(function ($query) use ($request) {
                $query->where("promo_code", $request->input("promo_code"));
                $query->where("valid_from", "<=", Carbon::now()->format("Y-m-d"));
                $query->where("valid_to", ">=", Carbon::now()->format("Y-m-d"));
            })->first();

            $total_uses = PassengerBooking::where("promo_code", $request->input("promo_code"))
            ->join("payment_transactions as pt", "pt.reference_id", "=", "ticket_bookings.id")
            ->join("ticket_bundles as tb", "tb.ticket_id", "=", "ticket_bookings.id")
            ->where("pt.type", 1)
            ->where("status", 1)
            ->where("tb.bundle_id", 3)
            ->sum("tb.bundle_qty");

            if (!$promo || $promo->volume <= $total_uses) {
                return redirect()->route("frontend.ticketing")->withErrors([
                    "promo_code" => "Sorry! This promo code has expired."
                ])->withInputs($request->all());
            }

            if ($promo && ($promo->volume - $total_uses) < $request->input("ticket_qty")) {
                return redirect()->route("frontend.ticketing")->withErrors([
                    "promo_code" => "Sorry! Entered qty is not available for this promo code."
                ])->withInputs($request->all());
            }
        }

        /* Create values for database  */
        $values = $request->all();
        
        $values["date"] = date("Y-m-d", strtotime($values["date"]));
        $values["ticket_no"] = uniqid("MKB");
        $values["ticket_qty"] = $request->input('total_ticket_qty');
        $values["total_price"] = $request->input('total_fixed_price');
        
        $ticket = PassengerBooking::create($values);
       foreach ($request->input("bundle_id") as $key => $bundleline) {
            /*products_bundle*/
            $this->data["products_bundle"] = BundleProduct::where("bundle_id", $bundleline)
            ->orderBy("bundle_id")
            ->lists("product_id")
            ->toArray();
            foreach($this->data["products_bundle"] as $products_value)
            {
                ProductValue::firstOrCreate([
                    "ticket_id" => $ticket->id,
                    "product_qty" => $request->input("ticket_qty_id")[$key],
                    "product_id" => $products_value,
                    "status" => 'not processed'
                ]);
            }
            if($this->data["products_bundle"] == "")
            {
               $tags =""; 
            }
            else
            {
             $tags = implode(", ", $this->data["products_bundle"]); 
            }
            if($bundleline == '3')
            {
               
                $ticket->promo_code = $request->input('promo_id')[0];
                $ticket->save();
              
            }
           
                
        
            TicketBundle::firstOrCreate([
                "ticket_id" => $ticket->id,
                "bundle_id" => $bundleline,
                "bundle_qty" => $request->input("ticket_qty_id")[$key],
                "product_id" => $tags,
                "discount" => $request->input("bundle_id_id")[$key]
            ]);
        }
        TicketBundle::whereNotIn("bundle_id", $request->input("bundle_id"))
            ->where("ticket_id", $ticket->id)->delete();

         return redirect()->route("frontend.payment.process", [
            $ticket->id
        ]);
        
      
    }

    public function postValidatePromoCode(Request $request)
    {
        $this->validate($request, [
            "promo_code" => "required|exists:promo_codes,promo_code",
            "qty" => "required|numeric"
        ], [
            "promo_code.exists" => "Sorry! This promo code is not valid."
        ]);

        $promo = PromoCode::select(["discount", "volume"])->where(function ($query) use ($request) {
            $query->where("promo_code", $request->input("promo_code"));
            $query->where("valid_from", "<=", Carbon::now()->format("Y-m-d"));
            $query->where("valid_to", ">=", Carbon::now()->format("Y-m-d"));
        })->first();

        //$total_uses = PassengerBooking::where("promo_code", $request->input("promo_code"))->count();

        $total_uses = PassengerBooking::where("promo_code", $request->input("promo_code"))
            ->join("payment_transactions as pt", "pt.reference_id", "=", "ticket_bookings.id")
            ->join("ticket_bundles as tb", "tb.ticket_id", "=", "ticket_bookings.id")
            ->where("pt.type", 1)
            ->where("status", 1)
            ->where("tb.bundle_id", 3)
            ->sum("tb.bundle_qty");

        if (!$promo || $promo->volume <= $total_uses) {
            return response()->json([
                "promo_code" => ["Sorry! This promo code has expired."]
            ], 422);
        }

        if ($promo && ($promo->volume - $total_uses) < $request->input("qty")) {
            return response()->json([
                "promo_code" => ["Sorry! Entered qty is not available for this promo code."]
            ], 422);
        }

        return response()->json($promo);
    }

    public function postProductCost(Request $request)
    {
        $this->validate($request, [
            "product_id" => "required|exists:products,id"
        ], [
            "product_id.exists" => "Sorry! The product you've selected dose not exists."
        ]);

        $product = Product::select(["price AS cost", "photo", "description"])->find($request->input("product_id"));
        $product->photo = $product->getURL();

        return response()->json($product);
    }

    public function getPaymentSummery($id)
    {
        $this->data["page_title"] = "Ticketing";
        $this->data["page_sub_title"] = "";
        $this->data["button"] = FALSE;

        $this->data["booking"] = PassengerBooking::findOrFail($id);
         $this->data["bundle_product"] = TicketBundle::where("ticket_id",'=', $this->data["booking"] ->id)->join("master_bundles as pt", "pt.id", "=", "bundle_id")->get()->all();
        $this->data["discount"] = TicketBundle::where("ticket_id",'=', $this->data["booking"] ->id)->where("bundle_id","=","3")->first();
        $dw = date( "l", strtotime($this->data["booking"]->date));
        $this->data["price"] = Price::where("name",'=', $dw)->first();
        if (!$this->data["booking"]->getTransaction) {
            throw new NotFoundHttpException();
        }
        return $this->View("template.summery");
    }

    public function getPrintSummery($id)
    {
        $this->data["booking"] = PassengerBooking::findOrFail($id);

        if (!$this->data["booking"]->getTransaction) {
            throw new NotFoundHttpException();
        }

        $this->data["bundle_product"] = TicketBundle::where("ticket_id",'=', $this->data["booking"] ->id)->join("master_bundles as pt", "pt.id", "=", "bundle_id")->get()->all();
        $this->data["discount"] = TicketBundle::where("ticket_id",'=', $this->data["booking"] ->id)->where("bundle_id","=","3")->first();
        $dw = date( "l", strtotime($this->data["booking"]->date));
        $this->data["price"] = Price::where("name",'=', $dw)->first();
        
        $this->data["summery_html"] = View("email.ticket.confirmation1", $this->data);
        return View("email.ticket.confirmation", $this->data);
    }
}
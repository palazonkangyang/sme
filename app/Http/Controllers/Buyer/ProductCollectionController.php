<?php

namespace SME\Http\Controllers\Buyer;

use Carbon\Carbon;
use SME\Http\Models\PassengerBooking;
use SME\Http\Models\ProductCollection;
use SME\Http\Models\ProductCollectionLocation;
use SME\Http\Models\Masters\TicketBundle;
use SME\Http\Models\Product;
use SME\Http\Models\Masters\ProductValue;
use Illuminate\Http\Request;
use SME\Http\Requests\Buyer\ProductCollection\StoreRequest;
use SME\Http\Requests\Buyer\ProductCollection\UpdateRequest;

class ProductCollectionController extends BuyerController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Product Collections");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Product Collections");
        $q = $request->get("q");
        
        $order = $request->get("order");
        $order_by = $request->get("orderBy");
        $user_name = \Auth::buyer()->user()->id;
        $collections = ProductValue::where('buyer_id' ,'=',$user_name)->join("product_collection_locations as pt", "location_id", "=", "pt.id")->select('product_values.*','pt.name')->get()->all();
        $this->data["items"] = $collections;
        return $this->view("productcollection.all");
    }

    public function getVerification()
    {
        $this->setPageTitle("Ticket Verification");
        return $this->view("productcollection.verification");
    }

    public function viewTickets(Request $request)
    {
        $this->setPageTitle("Ticket Verification");
        $promoos = ProductValue::where("ticket_id",'=', $request->input("ticket_idd"))->join("products as pt", "product_id", "=", "pt.id")->select('product_values.*','pt.name')->get()->all();
        $this->data["items"] = $promoos;
        $this->data["tickets_no"] = $_POST['ticket_no'];
      
        return $this->view("productcollection.view",$this->data);
    }
    public function getTicketid()
    {
        
        $msg = $_GET['ticket_number'];
       
        $ticket_passenger = PassengerBooking::select(["id"])->where("ticket_no", $_GET['ticket_number'])->first();
         
     
        return response()->json(array('msg'=> $ticket_passenger->id), 200);

    }

    public function postVerification($id)
    {
        $this->data["collection"] = ProductValue::where("product_values.id",'=', $id)->join("ticket_bookings as pt", "ticket_id", "=", "pt.id")->select('product_values.*','pt.ticket_no')->first();


        if ($this->data["collection"]->status == "not processed" && $this->validateTicket($this->data["collection"]->ticket_id,$this->data["collection"]->product_id) != TRUE) {
            return $this->validateTicket($this->data["collection"]->ticket_id,$this->data["collection"]->product_id);
        };
        
        return redirect()->route("buyer.collection.product.add", array("ticket_id" =>$this->data["collection"]->ticket_id,"product_id" => $this->data["collection"]->product_id));
    }

    private function validateTicket($ticket_no,$product_no)
    {
        $ticket = PassengerBooking::where(function ($query) use ($ticket_no) {
            $query->where("id", $ticket_no);
            
        })
            ->first();
            
        /* Validate ticket code */
        if (!$ticket || empty($ticket_no)) {
            return redirect()->route("buyer.collection.product.verification.post")->with("alert", [
                "success" => false,
                "message" => "This ticket number is not a valid."
            ])->withInput();
        }

        /* Verification of product availability */
        if ($product_no == "" || !\Auth::buyer()->user()->products()->where("product_id", $product_no)->first()) {
            return redirect()->route("buyer.collection.product.verification.post")->with("alert", [
                "success" => false,
                "message" => "Sorry! You are not allowed to collect this booking product."
            ])->withInput();
        }

        /* Validate if already collected */
        $collection = ProductValue::where([
            "ticket_id" => $ticket_no,
            "product_id" =>$product_no,
            "status" =>"processed"

        ])->first();

        if ($collection) {
            return redirect()->route("buyer.collection.product.verification.post")->with("alert", [
                "success" => false,
                "message" => "The product has been collected on " . $collection->updated_at->format('d/m/Y h:i') . "."
            ])->withInput();
        }

        

        return TRUE;
    }

    public function create($ticket_no,$product_no)
    {
         if ($this->validateTicket($ticket_no,$product_no) !== TRUE) {
            $this->validateTicket($ticket_no,$product_no);
        }
        $this->setPageTitle("Add new Product Collection");
        $this->data["ticket"] = ProductValue::where("ticket_id", $ticket_no)->where("product_id", $product_no)->first();
       
        $this->data["locations"] = \Auth::buyer()->user()->allLocations()->orderBy("name")
            ->lists("name", "location_id")
            ->prepend("Select:", "");

        return $this->view("productcollection.add");
    }

    public function store(StoreRequest $request)
    {
        $booking_no = $request->input("booking_id");

        
        $values = $request->all();
        
        $user_update = ProductValue::where("ticket_id",$values["booking_id"])->where("product_id",$values["product_id"])
                ->update( 
                       array( 
                             "location_id" => $values["location_id"],
                             "remark" => $values["remark"],
                             "buyer_id" => \Auth::buyer()->user()->id,
                             "status" => "processed"
                             )
                       );
                $user = ProductValue::where("ticket_id",$values["booking_id"])->where("product_id",$values["product_id"])->first();
     
        return redirect()->route("buyer.collection.product.verification")->with("alert", [
            "success" => TRUE,
            "message" => "Product Collection Location has been successfully created."
        ]);
    }

    public function edit($id)
    {
        $this->data["ticket"] = ProductValue::findOrFail($id);
         if ($this->validateTicket($this->data["ticket"]->ticket_id,$this->data["ticket"]->product_id) !== TRUE) {
            $this->validateTicket($this->data["ticket"]->ticket_id,$this->data["ticket"]->product_id);
        }
        $this->setPageTitle("Edit Collection");

        $this->data["locations"] = \Auth::buyer()->user()->allLocations()->orderBy("name")
            ->lists("name", "location_id")
            ->prepend("Select:", "");
           
           
        return $this->view("productcollection.edit");
    }

    public function update(UpdateRequest $request, $id)
    {
        $ticket = ProductValue::findOrFail($id);

        $values = $request->only("remark");

         $user_update = ProductValue::where("id",$id)
                ->update( 
                       array( 
                             
                             "remark" => $values["remark"]
                             
                             )
                       );

        return redirect()->route("buyer.collection.product.edit", [$ticket->id])->with("alert", [
            "success" => TRUE,
            "message" => "Product Collection Location has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $collection = ProductCollection::findOrFail($id);

        $collection->forcce();

        return redirect()->route("buyer.collection.all")->with("alert", [
            "success" => TRUE,
            "message" => "Product Collection Location has been successfully deleted."
        ]);
    }


}
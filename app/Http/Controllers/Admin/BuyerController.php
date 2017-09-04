<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Buyer;
use SME\Http\Requests;
use Mail;

class BuyerController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Members");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Members");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $users = Buyer::where(function ($query) use ($q) {
            $query->where("company_name", "LIKE", "%$q%")
                
                ->orWhere("email", "LIKE", "%$q%")
                ->orWhere("postal_code", "LIKE", "%$q%")
                ->orWhere("contact_no", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $users->orderBy($order_by, $order);
        } else {
            $users->orderBy("id", "desc");
        }

        $this->data["items"] = $users->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("buyer.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Buyer");
        $this->data["buyer"] = new Buyer();
        return $this->view("buyer.add");
    }

    public function store(Requests\Admin\Buyer\StoreRequest $request)
    {
        $values = $request->only([
            "name",
            "company_name",
            "email",
            "password",
            "address",
            "postal_code",
            "contact_no",
            "spe_ticket_price",
            'status'
        ]);


        $values["password"] = bcrypt($values["password"]);
        
        $buyer = Buyer::create($values);
        
        /* Send Mail to the Buyer with Credentials */

        $this->data["buyer"] = $buyer;

   

        Mail::send("email.admin.buyer.credentials", $this->data, function ($message) use ($buyer) {
            $message->from("info@SME.com", "Makan Bus")->subject("Account credentials for Buyer")->to($buyer->email);
        });

        return redirect()->route("admin.buyer.edit", [$buyer->id])->with("alert", [
            "success" => TRUE,
            "message" => "Buyer has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["buyer"] = Buyer::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["buyer"]->company_name);

        

        return $this->view("buyer.edit");
    }

    public function update(Requests\Admin\Buyer\UpdateRequest $request, $id)
    {
        $buyer = Buyer::findOrFail($id);

        $values = $request->only([
            "name",
            "company_name",
            "email",
            "password",
            "address",
            "postal_code",
            "contact_no",
            "spe_ticket_price",
            'status'
        ]);
        
        if (empty($values["password"])) {
            unset($values["password"]);
        } else {
            $values["password"] = bcrypt($values["password"]);
        }

        $buyer->update($values);

        

        return redirect()->route("admin.buyer.edit", [$buyer->id])->with("alert", [
            "success" => TRUE,
            "message" => "Buyer has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $buyer = Buyer::findOrFail($id);

        $buyer->delete();

        return redirect()->route("admin.buyer.all")->with("alert", [
            "success" => TRUE,
            "message" => "Buyer has been successfully deleted."
        ]);
    }

   
}

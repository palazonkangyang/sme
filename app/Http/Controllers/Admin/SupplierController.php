<?php

namespace SME\Http\Controllers\Admin;

use Illuminate\Http\Request;

use SME\Http\Models\Supplier;
use SME\Http\Requests;
use Mail;

class SupplierController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Suppliers");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Suppliers");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $users = Supplier::where(function ($query) use ($q) {
            $query->where("company_name", "LIKE", "%$q%")
                ->orWhere("contact_person", "LIKE", "%$q%")
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

        return $this->view("supplier.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Supplier");
        $this->data["supplier"] = new Supplier();
        return $this->view("supplier.add");
    }

    public function store(Requests\Admin\Supplier\StoreRequest $request)
    {
        $values = $request->only([
            "company_name",
            "contact_person",
            "email",
            "password",
            "address",
            "postal_code",
            "contact_no",
            "spe_ticket_price",
            "featured",
            'status'
        ]);


        $values["password"] = bcrypt($values["password"]);
        
        $supplier = supplier::create($values);
        
        /* Send Mail to the Supplier with Credentials */

        $this->data["supplier"] = $supplier;

   

        Mail::send("email.admin.supplier.credentials", $this->data, function ($message) use ($supplier) {
            $message->from("info@SME.com", "Makan Bus")->subject("Account credentials for Supplier")->to($supplier->email);
        });

        return redirect()->route("admin.supplier.edit", [$supplier->id])->with("alert", [
            "success" => TRUE,
            "message" => "Supplier has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["supplier"] = Supplier::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["supplier"]->company_name);

        

        return $this->view("supplier.edit");
    }

    public function update(Requests\Admin\Supplier\UpdateRequest $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $values = $request->only([
            "company_name",
            "contact_person",
            "email",
            "password",
            "address",
            "postal_code",
            "contact_no",
            "spe_ticket_price",
            "featured",
            'status'
        ]);
        
        if (empty($values["password"])) {
            unset($values["password"]);
        } else {
            $values["password"] = bcrypt($values["password"]);
        }

        $supplier->update($values);

        

        return redirect()->route("admin.supplier.edit", [$supplier->id])->with("alert", [
            "success" => TRUE,
            "message" => "Supplier has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()->route("admin.supplier.all")->with("alert", [
            "success" => TRUE,
            "message" => "Supplier has been successfully deleted."
        ]);
    }

   
}

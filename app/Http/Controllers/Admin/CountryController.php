<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Country;
use SME\Http\Models\Zone;
use SME\Http\Requests;
use Mail;

class CountryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Countries");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Countries");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $countries = Country::join("zones as pt", "pt.id","=", "countries.zone_id")->select("countries.*","pt.zone")->where(function ($query) use ($q) {
            $query->where("country_name", "LIKE", "%$q%");
            $query->where("country_code", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $countries->orderBy($order_by, $order);
        } else {
            $countries->orderBy("id", "desc");
        }

        $this->data["items"] = $countries->paginate(10);
        
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("country.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Country");
        $this->data["country"] = new Country();
        $this->data["zones"] = Zone::orderBy("zone")->lists("zone", "id")->prepend("Select:", "");
         return $this->view("country.add");
    }

    public function store(Requests\Admin\Country\StoreRequest $request)
    {
        $values = $request->only([
            "country_name",
            "country_code",
            "zone_id",
            "status",
        ]);
        $country = Country::create($values);
        $this->data["country"] = $country;
        return redirect()->route("admin.country.edit", [$country->id])->with("alert", [
            "success" => TRUE,
            "message" => "Country has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["country"] = Country::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["country"]->country);
        $this->data["zones"] = Zone::orderBy("zone")->lists("zone", "id")->prepend("Select:", "");
         return $this->view("country.edit");
    }

    public function update(Requests\Admin\Country\UpdateRequest $request, $id)
    {
        $country = Country::findOrFail($id);
        $values = $request->only([
            "country_name",
            "country_code",
            "zone_id",
            "status",
        ]);
        $country->update($values);
        return redirect()->route("admin.country.edit", [$country->id])->with("alert", [
            "success" => TRUE,
            "message" => "Country has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $country = Country::findOrFail($id);

        $country->delete();

        return redirect()->route("admin.country.all")->with("alert", [
            "success" => TRUE,
            "message" => "Country has been successfully deleted."
        ]);
    }
}

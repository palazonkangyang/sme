<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Zone;
use SME\Http\Requests;
use Mail;

class ZoneController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Zones");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Zones");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $zones = Zone::where(function ($query) use ($q) {
            $query->where("zone", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $zones->orderBy($order_by, $order);
        } else {
            $zones->orderBy("id", "desc");
        }

        $this->data["items"] = $zones->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("zone.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new zone");
        $this->data["zone"] = new Zone();
         return $this->view("zone.add");
    }

    public function store(Requests\Admin\Zone\StoreRequest $request)
    {
        $values = $request->only([
            "zone",
            "status",
        ]);
        $zone = Zone::create($values);
        $this->data["zone"] = $zone;
        return redirect()->route("admin.zone.edit", [$zone->id])->with("alert", [
            "success" => TRUE,
            "message" => "Zone has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["zone"] = Zone::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["zone"]->zone);
         return $this->view("zone.edit");
    }

    public function update(Requests\Admin\Zone\UpdateRequest $request, $id)
    {
        $zone = Zone::findOrFail($id);
        $values = $request->only([
            "zone",
            "status",
        ]);
        $zone->update($values);
        return redirect()->route("admin.zone.edit", [$zone->id])->with("alert", [
            "success" => TRUE,
            "message" => "Zone has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $zone = Zone::findOrFail($id);

        $zone->delete();

        return redirect()->route("admin.zone.all")->with("alert", [
            "success" => TRUE,
            "message" => "Zone has been successfully deleted."
        ]);
    }
}

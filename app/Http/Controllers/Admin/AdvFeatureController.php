<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\AdvFeature;
use SME\Http\Requests;
use Mail;

class AdvFeatureController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Advertisement Features");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Advertisement Features");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $adv_features = AdvFeature::where(function ($query) use ($q) {
            $query->where("adv_feature", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $adv_features->orderBy($order_by, $order);
        } else {
            $adv_features->orderBy("id", "asc");
        }

        $this->data["items"] = $adv_features->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("adv_feature.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Advertisement feature");
        $this->data["adv_feature"] = new AdvFeature();
         return $this->view("adv_feature.add");
    }

    public function store(Requests\Admin\AdvFeature\StoreRequest $request)
    {
        $values = $request->only([
            "adv_feature",
            "status",
        ]);
        $adv_feature = AdvFeature::create($values);
        $this->data["adv_feature"] = $adv_feature;
        return redirect()->route("admin.adv_feature.edit", [$adv_feature->id])->with("alert", [
            "success" => TRUE,
            "message" => "Advertisement Feature has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["adv_feature"] = AdvFeature::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["adv_feature"]->adv_feature);
         return $this->view("adv_feature.edit");
    }

    public function update(Requests\Admin\AdvFeature\UpdateRequest $request, $id)
    {
        $adv_feature = AdvFeature::findOrFail($id);
        $values = $request->only([
            "adv_feature",
            "status",
        ]);
        $adv_feature->update($values);
        return redirect()->route("admin.adv_feature.edit", [$adv_feature->id])->with("alert", [
            "success" => TRUE,
            "message" => "Advertisement Feature has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $adv_feature = AdvFeature::findOrFail($id);

        $adv_feature->delete();

        return redirect()->route("admin.adv_feature.all")->with("alert", [
            "success" => TRUE,
            "message" => "Advertisement Feature has been successfully deleted."
        ]);
    }
}

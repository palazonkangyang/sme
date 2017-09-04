<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Feature;
use SME\Http\Requests;
use Mail;

class FeatureController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Subscription Features");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Subscription Features");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $features = Feature::where(function ($query) use ($q) {
            $query->where("feature", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $features->orderBy($order_by, $order);
        } else {
            $features->orderBy("id", "desc");
        }

        $this->data["items"] = $features->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("feature.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Subscription feature");
        $this->data["feature"] = new Feature();
         return $this->view("feature.add");
    }

    public function store(Requests\Admin\Feature\StoreRequest $request)
    {
        $values = $request->only([
            "feature",
            "status",
        ]);
        $feature = Feature::create($values);
        $this->data["feature"] = $feature;
        return redirect()->route("admin.feature.edit", [$feature->id])->with("alert", [
            "success" => TRUE,
            "message" => "Subscription Feature has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["feature"] = Feature::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["feature"]->feature);
         return $this->view("feature.edit");
    }

    public function update(Requests\Admin\Feature\UpdateRequest $request, $id)
    {
        $feature = Feature::findOrFail($id);
        $values = $request->only([
            "feature",
            "status",
        ]);
        $feature->update($values);
        return redirect()->route("admin.feature.edit", [$feature->id])->with("alert", [
            "success" => TRUE,
            "message" => "Subscription Feature has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $feature = Feature::findOrFail($id);

        $feature->delete();

        return redirect()->route("admin.feature.all")->with("alert", [
            "success" => TRUE,
            "message" => "Subscription Feature has been successfully deleted."
        ]);
    }
}

<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\SubscriptionPackage;
use SME\Http\Models\Feature;
use SME\Http\Requests;
use Mail;

class SubscriptionPackageController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Subscription Packages");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Subscription Packages");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $subscription_packages = SubscriptionPackage::where(function ($query) use ($q) {
            $query->where("subscription_package", "LIKE", "%$q%");
            
        });

        if ($order && $order_by) {
            $subscription_packages->orderBy($order_by, $order);
        } else {
            $subscription_packages->orderBy("id", "desc");
        }


        $this->data["items"] = $subscription_packages->paginate(10);
          foreach($this->data["items"] as $item)
          {
            
            $item->options = explode(",",$item->options);
            $array_options =[];
            
                foreach($item->options as $key => $option)
                {
                    $feature= Feature::where('id','=',$option)->first();

                    $array_options = array_add($array_options,$key,$feature->feature);
                }
                $options =implode(', ', $array_options);

                $item->options = $options;
                
          }
          

        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("subscription_package.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Subscription Package");
        $this->data["subscription_package"] = new SubscriptionPackage();
         $this->data["features"] = Feature::orderBy("feature")->lists("feature", "id");
         return $this->view("subscription_package.add");
    }

    public function store(Requests\Admin\SubscriptionPackage\StoreRequest $request)
    {
        $values = $request->only([
            "subscription_package",
            "subscription_price",
            "options",
            "status",
        ]);
        $options =implode(', ', $values['options']);
        $values['options'] = $options;
        $subscription_package = SubscriptionPackage::create($values);
        $this->data["subscription_package"] = $subscription_package;
        return redirect()->route("admin.subscription_package.edit", [$subscription_package->id])->with("alert", [
            "success" => TRUE,
            "message" => "Subscription Package has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["subscription_package"] = SubscriptionPackage::findOrFail($id);
         $this->data["options"]  =explode(",",$this->data["subscription_package"]->options);
         $this->setPageTitle("Edit - " . $this->data["subscription_package"]->subscription_package);
       $this->data["features"] = Feature::orderBy("feature")->lists("feature", "id");
         return $this->view("subscription_package.edit");
    }

    public function update(Requests\Admin\SubscriptionPackage\UpdateRequest $request, $id)
    {
        $subscription_package = SubscriptionPackage::findOrFail($id);
        $values = $request->only([
            "subscription_package",
            "subscription_price",
            "options",
            "status",
        ]);

        $options =implode(",",$values['options']);
        $values['options'] = $options;
        $subscription_package->update($values);
        return redirect()->route("admin.subscription_package.edit", [$subscription_package->id])->with("alert", [
            "success" => TRUE,
            "message" => "Subscription Package has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $subscription_package = SubscriptionPackage::findOrFail($id);

        $subscription_package->delete();

        return redirect()->route("admin.subscription_package.all")->with("alert", [
            "success" => TRUE,
            "message" => "Subscription Package has been successfully deleted."
        ]);
    }
}

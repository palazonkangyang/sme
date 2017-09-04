<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\AdvertisementPackage;
use SME\Http\Models\AdvFeature;
use SME\Http\Requests;
use Mail;

class AdvertisementPackageController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Advertisement Packages");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Advertisement Packages");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $advertisement_packages = AdvertisementPackage::where(function ($query) use ($q) {
            $query->where("advertisement_package", "LIKE", "%$q%");
            
        });

        if ($order && $order_by) {
            $advertisement_packages->orderBy($order_by, $order);
        } else {
            $advertisement_packages->orderBy("id", "desc");
        }


        $this->data["items"] = $advertisement_packages->paginate(10);
          foreach($this->data["items"] as $item)
          {
            
            $item->options = explode(",",$item->options);
            $array_options =[];
                foreach($item->options as $key => $option)
                {
                    $adv_feature= AdvFeature::where('id','=',$option)->first();

                    $array_options = array_add($array_options,$key,$adv_feature->adv_feature);
                }
                $options =implode(', ', $array_options);

                $item->options = $options;
                
          }
          

        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("advertisement_package.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Advertisement Package");
        $this->data["advertisement_package"] = new AdvertisementPackage();
         $this->data["features"] = AdvFeature::orderBy("adv_feature")->lists("adv_feature", "id");
           return $this->view("advertisement_package.add");
    }

    public function store(Requests\Admin\AdvertisementPackage\StoreRequest $request)
    {
        $values = $request->only([
            "advertisement_package",
            "advertisement_price",
            "options",
            "status",
        ]);
        $options =implode(', ', $values['options']);
        $values['options'] = $options;
        $advertisement_package = AdvertisementPackage::create($values);
        $this->data["advertisement_package"] = $advertisement_package;
        return redirect()->route("admin.advertisement_package.edit", [$advertisement_package->id])->with("alert", [
            "success" => TRUE,
            "message" => "Advertisement Package has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["advertisement_package"] = AdvertisementPackage::findOrFail($id);
         $this->data["options"]  =explode(",",$this->data["advertisement_package"]->options);
         $this->setPageTitle("Edit - " . $this->data["advertisement_package"]->advertisement_package);
       $this->data["features"] = AdvFeature::orderBy("adv_feature")->lists("adv_feature", "id");
         return $this->view("advertisement_package.edit");
    }

    public function update(Requests\Admin\AdvertisementPackage\UpdateRequest $request, $id)
    {
        $advertisement_package = AdvertisementPackage::findOrFail($id);
        $values = $request->only([
            "advertisement_package",
            "advertisement_price",
            "options",
            "status",
        ]);

        $options =implode(",",$values['options']);
        $values['options'] = $options;
        $advertisement_package->update($values);
        return redirect()->route("admin.advertisement_package.edit", [$advertisement_package->id])->with("alert", [
            "success" => TRUE,
            "message" => "Advertisement Package has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $advertisement_package = AdvertisementPackage::findOrFail($id);

        $advertisement_package->delete();

        return redirect()->route("admin.advertisement_package.all")->with("alert", [
            "success" => TRUE,
            "message" => "Advertisement Package has been successfully deleted."
        ]);
    }
}

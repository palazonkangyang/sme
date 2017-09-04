<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\ServiceCategory;
use SME\Http\Requests;
use Mail;

class ServiceCategoryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Service Categories");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Service Categories");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $service_categories = ServiceCategory::where(function ($query) use ($q) {
            $query->where("service_category", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $service_categories->orderBy($order_by, $order);
        } else {
            $service_categories->orderBy("id", "asc");
        }

        $this->data["items"] = $service_categories->paginate(10);
        foreach($this->data["items"] as $item)
        {
            if($item->parent_id != '0')
            {
            $parent= ServiceCategory::where('id','=',$item->parent_id)->first();
            
                $item->parent_id = $parent->service_category;
            }
            else
            {
                $item->parent_id = 'NA';                
            }
        }
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("service_category.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Service Category");

        $this->data["service_category"] = new ServiceCategory();
        $this->data["parents"] = ServiceCategory::orderBy("service_category")->lists("service_category", "id")->prepend("Select:", "");

        return $this->view("service_category.add");
    }

    public function store(Requests\Admin\ServiceCategory\StoreRequest $request)
    {
        $values = $request->only([
            "service_category",
            "picture_name",
            "parent_id",
            "status",
        ]);
        
        if ($request->hasFile("image")) {

            $file = $request->file("image");

            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());

            $file->move(public_path("uploads/Service_Categories/"), $destination_file);

            $values["image"] = $destination_file;
        }

        $service_category = ServiceCategory::create($values);

        $this->data["service_category"] = $service_category;

        return redirect()->route("admin.service_category.edit", [$service_category->id])->with("alert", [
            "success" => TRUE,
            "message" => "Service Category has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["service_category"] = ServiceCategory::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["service_category"]->service_category);
        $this->data["parents"] = ServiceCategory::where('id','!=',$id)->orderBy("service_category")->lists("service_category", "id")->prepend("Select:", "");
        return $this->view("service_category.edit");
    }

    public function update(Requests\Admin\ServiceCategory\UpdateRequest $request, $id)
    {
        $service_category = ServiceCategory::findOrFail($id);
        $values = $request->only([
            "service_category",
            "picture_name",
            "parent_id",
            "status",
        ]);
        if ($request->hasFile("image")) {

            if (!empty($service_category->image)) {
                @unlink(public_path("uploads/Service_Categories/{$service_category->image}"));
            }

            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/Service_Categories/"), $destination_file);
            $values["image"] = $destination_file;
        }
        $service_category->update($values);
        return redirect()->route("admin.service_category.edit", [$service_category->id])->with("alert", [
            "success" => TRUE,
            "message" => "Service Category has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $service_category = ServiceCategory::findOrFail($id);

        $service_category->delete();

        return redirect()->route("admin.service_category.all")->with("alert", [
            "success" => TRUE,
            "message" => "Service Category has been successfully deleted."
        ]);
    }
}

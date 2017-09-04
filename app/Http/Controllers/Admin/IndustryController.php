<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Industry;
use SME\Http\Requests;
use Mail;

class IndustryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Industries");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Industries");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $industries = Industry::where(function ($query) use ($q) {
            $query->where("industry", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $industries->orderBy($order_by, $order);
        } else {
            $industries->orderBy("id", "desc");
        }

        $this->data["items"] = $industries->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("industry.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Industry");
        $this->data["industry"] = new Industry();
         return $this->view("industry.add");
    }

    public function store(Requests\Admin\Industry\StoreRequest $request)
    {
        $values = $request->only([
            "industry",
            "picture_name",
            "status",
        ]);
        
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/Industries/"), $destination_file);
            $values["image"] = $destination_file;
        }
        $industry = Industry::create($values);
        $this->data["industry"] = $industry;
        return redirect()->route("admin.industry.edit", [$industry->id])->with("alert", [
            "success" => TRUE,
            "message" => "Industry has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["industry"] = Industry::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["industry"]->industry);
         return $this->view("industry.edit");
    }

    public function update(Requests\Admin\Industry\UpdateRequest $request, $id)
    {
        $industry = Industry::findOrFail($id);
        $values = $request->only([
            "industry",
            "picture_name",
            "status",
        ]);
        if ($request->hasFile("image")) {

            if (!empty($industry->image)) {
                @unlink(public_path("uploads/Industries/{$industry->image}"));
            }

            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/Industries/"), $destination_file);
            $values["image"] = $destination_file;
        }
        $industry->update($values);
        return redirect()->route("admin.industry.edit", [$industry->id])->with("alert", [
            "success" => TRUE,
            "message" => "Industry has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $industry = Industry::findOrFail($id);

        $industry->delete();

        return redirect()->route("admin.industry.all")->with("alert", [
            "success" => TRUE,
            "message" => "Industry has been successfully deleted."
        ]);
    }
}

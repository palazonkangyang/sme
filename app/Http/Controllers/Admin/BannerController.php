<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Banner;
use SME\Http\Requests;
use Mail;

class BannerController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Advertising Banners");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Advertising Banners");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $banners = Banner::where(function ($query) use ($q) {
            $query->where("image", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $banners->orderBy($order_by, $order);
        } else {
            $banners->orderBy("id", "asc");
        }

        $this->data["items"] = $banners->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("banner.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Advertising Banner");
        $this->data["banner"] = new Banner();
        return $this->view("banner.add");
    }

    public function store(Requests\Admin\Banner\StoreRequest $request)
    {
        $values = $request->only([
            "period",
            "banner_name",
            "status",
        ]);

        
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());

            $file->move(public_path("uploads/Advertising_Banners/"), $destination_file);
            $values["image"] = $destination_file;
        }
        $banner = Banner::create($values);
        $this->data["image"] = $banner;
        return redirect()->route("admin.banner.edit", [$banner->id])->with("alert", [
            "success" => TRUE,
            "message" => "Advertising Banner has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["banner"] = Banner::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["banner"]->banner);
       return $this->view("banner.edit");
    }

    public function update(Requests\Admin\Banner\UpdateRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $values = $request->only([
            "period",
            "banner_name",
            "status",
        ]);
        if ($request->hasFile("image")) {

            if (!empty($banner->image)) {
                @unlink(public_path("uploads/Service_Categories/{$banner->image}"));
            }

            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/Advertising_Banners/"), $destination_file);
            $values["image"] = $destination_file;
        }
        $banner->update($values);
        return redirect()->route("admin.banner.edit", [$banner->id])->with("alert", [
            "success" => TRUE,
            "message" => "Advertising Banner has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $banner = Banner::findOrFail($id);

        $banner->delete();

        return redirect()->route("admin.banner.all")->with("alert", [
            "success" => TRUE,
            "message" => "Advertising Banner has been successfully deleted."
        ]);
    }
}

<?php

namespace SME\Http\Controllers\Admin;

use SME\Http\Models\Page;
use SME\Http\Requests\Admin\Page\StoreRequest;
use SME\Http\Requests\Admin\Page\UpdateRequest;

use Illuminate\Http\Request;

class PageController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Pages");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Pages");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $pages = Page::where(function ($query) use ($q) {
            $query->where("name", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $pages->orderBy($order_by, $order);
        } else {
            $pages->orderBy("id", "desc");
        }

        $this->data["items"] = $pages->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("page.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new Page");
        $this->data["page"] = new Page();

        return $this->view("page.add");
    }

    public function store(StoreRequest $request)
    {
        $values = $request->all();

        if ($request->hasFile("banner_image")) {
            $file = $request->file("banner_image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/banner/"), $destination_file);
            $values["banner_image"] = $destination_file;
        }

        $values["slug"] = $this->prep_url($values["slug"]);

        $page = Page::create($values);

        return redirect()->route("admin.page.edit", [$page->id])->with("alert", [
            "success" => TRUE,
            "message" => "Page has been successfully created."
        ]);
    }

    public function edit($id)
    {
        $this->data["page"] = Page::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["page"]->name);

        return $this->view("page.edit");
    }

    public function update(UpdateRequest $request, $id)
    {
        $page = Page::findOrFail($id);

        $values = $request->all();

        if ($request->hasFile("banner_image")) {

            if (!empty($page->banner_image)) {
                @unlink(public_path("uploads/banner/{$page->banner_image}"));
            }

            $file = $request->file("banner_image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/banner/"), $destination_file);
            $values["banner_image"] = $destination_file;
        }

        $values["slug"] = $this->prep_url($values["slug"]);
        $page->update($values);

        return redirect()->route("admin.page.edit", [$page->id])->with("alert", [
            "success" => TRUE,
            "message" => "Page has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $page = Page::findOrFail($id);

        $page->delete();

        return redirect()->route("admin.page.all")->with("alert", [
            "success" => TRUE,
            "message" => "Page has been successfully deleted."
        ]);
    }

    private function prep_url($url)
    {
        $url = preg_replace("/(\s+|[^a-z0-9\/])/i", "-", strtolower(trim($url)));
        return preg_replace("/\-+/", "-", $url);
    }
}
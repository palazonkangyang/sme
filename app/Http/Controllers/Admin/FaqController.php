<?php

namespace SME\Http\Controllers\Admin;
use Illuminate\Http\Request;
use SME\Http\Models\Faq;
use SME\Http\Requests;
use Mail;

class FaqController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Faqs");
    }

    public function index(Request $request)
    {
        $this->setPageTitle("All Faqs");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $faq = Faq::where(function ($query) use ($q) {
            $query->where("question", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $faq->orderBy($order_by, $order);
        } else {
            $faq->orderBy("id", "desc");
        }

        $this->data["items"] = $faq->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("faq.all");
    }

    public function create()
    {
        $this->setPageTitle("Add new faq");
        $this->data["faq"] = new Faq();
         return $this->view("faq.add");
    }

    public function store(Requests\Admin\Faq\StoreRequest $request)
    {
        $values = $request->only([
             "question",
            "description",
            "status",
        ]);
        $faq = Faq::create($values);
        $this->data["faq"] = $faq;
        return redirect()->route("admin.faq.edit", [$faq->id])->with("alert", [
            "success" => TRUE,
            "message" => "Faq has been successfully created."
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->data["faq"] = Faq::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["faq"]->faq);
         return $this->view("faq.edit");
    }

    public function update(Requests\Admin\Faq\UpdateRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $values = $request->only([
            "question",
            "description",
            "status",
        ]);
        $faq->update($values);
        return redirect()->route("admin.faq.edit", [$faq->id])->with("alert", [
            "success" => TRUE,
            "message" => "Faq has been successfully updated."
        ]);
    }

    public function destroy($id)
    {
        $this->validateCSRF();
        $faq = Faq::findOrFail($id);

        $faq->delete();

        return redirect()->route("admin.faq.all")->with("alert", [
            "success" => TRUE,
            "message" => "Faq has been successfully deleted."
        ]);
    }
}

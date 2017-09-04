<?php

namespace SME\Http\Controllers\Frontend;

use SME\Http\Models\PhotoGallery;
use SME\Http\Requests\Frontend\Gallery\UploadRequest;

class PhotoGalleryController extends FrontendController
{
    protected $_url = "https://api.instagram.com/v1/users/search";

    public function __construct()
    {
        parent::__construct();
        $this->_url .= "?" . http_build_query([
                "q" => config("app.instagram.hashtag"),
                "access_token" => config("app.instagram.access_token")
            ]);
    }

    public function index()
    {
        $this->data = [
            "page_title" => "Gallery",
            "page_sub_title" => "",
            "button" => FALSE
        ];

        $this->data["instagram_data"] = $this->getInstagramData();
        
        $this->data["gallery_images"] = PhotoGallery::where("status", 1)->get();
        return $this->view("template.gallery");
    }

    private function getInstagramData()
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $this->_url,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_SSL_VERIFYPEER => FALSE
        ]);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }


    public function upload(UploadRequest $request)
    {
        $files = $request->file("files");;

        foreach ($files as $file) {

            if (!empty($file)) {

                $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
                $file->move(public_path("uploads/photo-gallery/"), $destination_file);

                PhotoGallery::create([
                    "name" => $request->input("name"),
                    "description" => $request->input("description"),
                    "file" => $destination_file
                ]);
            }
        }

        return response()->json([
            "success" => true,
            "message" => "File(s) are successfully uploaded. Thank you!",
            "resetFields" => true
        ]);
    }


}

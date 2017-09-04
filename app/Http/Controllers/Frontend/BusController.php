<?php

namespace SME\Http\Controllers\Frontend;


use SME\Http\Models\Bus;

class BusController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBuses()
    {
        //if (\Carbon\Carbon::now() > \Carbon\Carbon::parse(\Carbon\Carbon::now()->format("Y-m-d 11:00:00")) && \Carbon\Carbon::now() < \Carbon\Carbon::parse(\Carbon\Carbon::now()->format("Y-m-d 21:00:00"))) {
            $buses = Bus::select([
                "name",
                "lat",
                "long",
                "icon"
            ])->active()->whereNotNull("lat")->get();

            return response()->json($buses->toArray());
//        } else {
//            return response()->json([
//                "success" => false
//            ]);
//        }
    }

    private function findLocation(Bus $bus)
    {
        $url = "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyArh05IHDTgHitd2fuTgCujbVpp2FYllaQ";

        $params = [
            "homeMobileCountryCode" => $bus->home_mcc,
            "homeMobileNetworkCode" => $bus->home_mnc,
            "radioType" => $bus->radio_type,
            "carrier" => $bus->carrier,
            "considerIp" => $bus->consider_ip,
        ];

        foreach ($bus->cell_id as $cell_id) {
            $params["cellTowers"][] = [
                "cellId" => trim($cell_id),
                "locationAreaCode" => $bus->location_area_code,
                "mobileCountryCode" => $bus->mcc,
                "mobileNetworkCode" => $bus->mnc,
            ];
        }

        foreach ($bus->mac_addresses as $address) {
            $params["wifiAccessPoints"][] = [
                "macAddress" => trim($address)
            ];
        }

        $content = json_encode($params);

        die($content);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $response = curl_exec($ch);

        if (!$response) {
            return false;
        }

        curl_close($ch);
        return json_decode($response);
    }
}
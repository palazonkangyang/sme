<?php

namespace SME\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Input;


class CustomRulesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('upload_count', function ($attribute, $value, $parameters) {
            $files = Input::file($parameters[0]);

            if (count($files) <= $parameters[1]) {
                return true;
            } else {
                return false;
            }
        });

        $this->app['validator']->extend('recaptcha', function ($attribute, $value, $parameters) {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 80);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                "secret" => config("app.recaptcha.secrete_key"),
                "response" => $value,
                "remoteip" => \Request::ip()
            ]);

            $response = json_decode(curl_exec($ch));
            return $response->success == true;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

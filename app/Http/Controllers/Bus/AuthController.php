<?php

namespace SME\Http\Controllers\Bus;

use Auth;
use Illuminate\Http\Request;
use SME\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Bus");
    }

    public function getLogin()
    {
        $this->addMetaTitle("Login");
        return $this->view("bus.auth.login");
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        if (Auth::bus()->attempt(array_merge($request->only(["email", "password"], ["status" => 1])), $request->input("remember_token"))) {
            return redirect()->route("bus.dashboard");
        } else {
            return redirect()->route("bus.auth.login")
                ->with("loginError", "Invalid login credentials. Please try again")
                ->withInput($request->all());
        }
    }

    public function logout()
    {
        Auth::bus()->logout();
        return redirect()->route("bus.auth.login");
    }
}
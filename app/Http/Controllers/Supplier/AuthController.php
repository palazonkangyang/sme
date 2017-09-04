<?php

namespace SME\Http\Controllers\Supplier;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Mail\Message;
use SME\Http\Controllers\Supplier\SupplierController;
use SME\Http\Requests\Buyer\Auth\ChangePasswordRequest;
use SME\Http\Requests\Buyer\Profile\UpdateRequest;
use Password;

class AuthController extends SupplierController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Auth");
    }

    public function getLogin()
    {
        $this->addMetaTitle("Login");
        return parent::View("auth.login");
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        if (Auth::supplier()->attempt(array_merge($request->only(["email", "password"], ["status" => 1])), $request->input("remember_token"))) {
            return redirect()->route("supplier.dashboard");
        } else {
            return redirect()->route("supplier.auth.login")
                ->with("loginError", "Invalid login credentials. Please try again")
                ->withInput($request->all());
        }
    }

    public function getForgetPassword()
    {
        return parent::View("auth.password.forget");
    }

    public function postForgetPassword(Request $request)
    {
        $response = Password::supplier()->sendResetLink($request->only('email'), function (Message $message) {
            $message->subject("Change Password");
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    public function getResetPassword(Request $request, $type, $token)
    {
        $this->data["token"] = $token;
        return parent::View("auth.password.reset");
    }

    public function postResetPassword(Request $request, $type, $token)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
            "password_confirmation" => "required"
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation'
        );

        $credentials["token"] = $token;

        $response = Password::supplier()->reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();

            Auth::supplier()->login($user);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect()->route("supplier.dashboard")->with('status', trans($response));
            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }


    public function getLogout()
    {
        Auth::supplier()->logout();
        return redirect()->route("supplier.auth.login");
    }

    public function getProfile()
    {
        $this->setPageTitle("My Profile");
        $this->setPageSubTitle("");

        $this->data["supplier"] = Auth::supplier()->user();
        return $this->view("auth.profile.index");
    }

    public function getEditProfile()
    {
        $this->setPageTitle("Edit Profile");
        $this->setPageSubTitle("My Profile");

        $this->data["supplier"] = Auth::supplier()->user();
        return $this->view("auth.profile.edit");
    }

    public function postEditProfile(UpdateRequest $request)
    {
        $supplier = Auth::supplier()->user();
        $values = $request->all();

        /* Remove email */
        unset($values["email"]);

        if (empty($values["password"])) {
            unset($values["password"]);
        } else {

            /* Validate old password */
            $values["password"] = bcrypt($values["password"]);

            if (!password_verify($values["old_password"], Auth::supplier()->user()->password)) {
                return redirect()
                    ->route("supplier.auth.profile.edit")
                    ->with("alert", [
                        "success" => FALSE,
                        "message" => "Old password was not valid. Please try again!"
                    ])
                    ->withInput();
            }

        }

        $supplier->update($values);

        return redirect()
            ->route("supplier.auth.profile")
            ->with("alert", [
                "success" => TRUE,
                "message" => "Your profile has been successfully updated!"
            ]);
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::supplier()->user();
        $user->password = bcrypt($request->input("password"));
        $user->first_login_attempt = 2;

        $user->save();

        \Session::flash('alert', [
            "success" => TRUE,
            "message" => "Your password has been changed!"
        ]);

        return response()->json([
            "success" => TRUE,
            "message" => "Your password has been changed!"
        ]);
    }

    public function postChangeAttempt()
    {
        $user = Auth::supplier()->user();
        $user->first_login_attempt = 2;
        $user->save();

        return response()->json([
            "success" => TRUE,
            "message" => "Attempt status has changed!"
        ]);
    }
}
<?php

namespace SME\Http\Controllers\Admin;

use Auth;
use Password;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use SME\Http\Models\Admin;


class AccountController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Account");
        $this->setPageSubTitle("Account Management");
    }

    /* Password Reset */

    public function getForgetPassword()
    {
        return parent::View("account.password.forget");
    }

    public function postForgetPassword(Request $request)
    {
        $response = Password::admin()->sendResetLink($request->only('email'), function (Message $message) {
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
        return parent::View("account.password.reset");
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

        $response = Password::admin()->reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();

            Auth::admin()->login($user);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect()->route("admin.dashboard")->with('status', trans($response));
            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }

    /* User Login */

    public function getLogin()
    {
        $this->addMetaTitle("Login");
        return parent::View("account.login");
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required|min:5"
        ]);


        if (Auth::admin()->attempt(array_merge($request->only(["email", "password"], ["status" => 1])), $request->input("remember_token"))) {
            return redirect()->route("admin.dashboard");
        } else {
            return redirect()->route("admin.account.login")
                ->with("loginError", "Invalid login credentials. Please try again")
                ->withInput($request->all());
        }
    }

    /* User Logout */
    public function getLogout()
    {
        Auth::admin()->logout();
        unset($_SESSION["username"]);
        return redirect()->route("admin.account.login");
    }

    /* User Profile */

    public function getProfile($id = NULL)
    {
        $this->setPageTitle("Profile");

        $this->data["user"] = Admin::findOrFail($id);
        return $this->View("account.profile");
    }

    public function getEditProfile($id = NULL)
    {
        $this->data["user"] = Admin::findOrFail($id);
        $this->setPageTitle("Edit - " . $this->data["user"]->getName());

        return $this->View("account.edit");
    }

    public function postEditProfile(Request $request, $id)
    {
        $user = Admin::findOrFail($id);
        $rules = [
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|email|unique:admin_users,email,{$id}",
            "password" => "min:5",
            "re_password" => "required_with:password|same:password",
        ];

        if ($user->role != 0) {
            $rules = array_merge($rules, [
                "status" => "required|in:1,2",
                "role" => "required|in:1,2,3,4"
            ]);
        }

        $this->validate($request, $rules);
        $values = $request->all();

        if (empty($values["password"])) {
            unset($values["password"]);
        } else {
            $values["password"] = bcrypt($values["password"]);
        }

        $user->update($values);
        return redirect()->route("admin.account.profile.edit", [$user->id])->with("alert", [
            "success" => TRUE,
            "message" => "User has been successfully updated."
        ]);
    }

    public function getCreate()
    {
        $this->setPageTitle("Add new User");

        $this->data["user"] = new Admin();
        return $this->view("account.add");
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, [
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|email|unique:admin_users,email",
            "password" => "required|min:5",
            "re_password" => "required|same:password",
            "status" => "required|in:1,2",
            "role" => "required|in:1,2,3,4"
        ]);

        $values = $request->all();
        $values["password"] = bcrypt($values["password"]);
        $user = Admin::create($values);

        return redirect()->route("admin.account.profile.edit", [$user->id])->with("alert", [
            "success" => TRUE,
            "message" => "User has been successfully created."
        ]);
    }

    public function getAll(Request $request)
    {
        $this->setPageTitle("All Users");
        $q = $request->get("q");

        $order = $request->get("order");
        $order_by = $request->get("orderBy");

        $users = Admin::where(function ($query) use ($q) {
            $query->where("email", "LIKE", "%$q%")
                ->orWhere("first_name", "LIKE", "%$q%")
                ->orWhere("last_name", "LIKE", "%$q%");
        });

        if ($order && $order_by) {
            $users->orderBy($order_by, $order);
        } else {
            $users->orderBy("id", "desc");
        }

        $this->data["items"] = $users->paginate(10);
        $this->data["ItemNumberStart"] = (($this->data["items"]->currentPage() - 1) * $this->data["items"]->perPage()) + 1;

        return $this->view("account.all");
    }

    public function getDelete(Request $request, $id)
    {
        $this->validateCSRF();
        $user = Admin::findOrFail($id);

        if ($user->role == 0) {
            abort(403, "Super Admin Cannot be deleted");
        }

        $user->delete();
        return redirect()->route("admin.account.all")->with("alert", [
            "success" => TRUE,
            "message" => "User has been successfully deleted."
        ]);
    }
}

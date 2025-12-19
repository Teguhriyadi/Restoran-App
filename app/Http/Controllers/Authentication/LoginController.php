<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("pages.authentication.login");
    }

    public function post_login(Request $req)
    {
        $credentials = [
            "username" => $req->username,
            "password" => $req->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->to("/dashboard");
        }
    }
}

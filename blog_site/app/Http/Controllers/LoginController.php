<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // show login view
    public function login() {
        // check if logged in
        if (Auth::check()) {
            return redirect()->route("admin");
        }
        return view("auth.login");
    }

    public function loginSubmit(Request $request) {
        $validated = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route("admin");
        } else {
            return back()->withErrors("Email and password doesn't match!");
        }
    }


    //log out
    public function logout() {
        Auth::logout();
        return redirect()->route("login")->with("success", "You are logged out! Login again!");
    }
}

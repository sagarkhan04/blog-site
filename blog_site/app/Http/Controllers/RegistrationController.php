<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    // show registraion page
    public function register() {

        // check if logged in
        if (Auth::check()) {
            return redirect()->route("admin");
        }
        return view("auth.register");
    }

    // handle registration form
    public function registerSubmit(Request $request) {
        // validate user submitted data
        $validated = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "confirmed"],
            "password_confirmation" => ["required"],
        ]);

        // after validate create new user
        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => $validated["password"],
        ]);

        // after creating new user redirect to login page
        return redirect()->route("login")->with("success", "Registration success! Login now!");
    }
}

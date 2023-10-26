<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [LoginController::class, "login"])->name("login");
Route::post("/login", [LoginController::class, "loginSubmit"])->name("login.submit");


Route::get("/register", [RegistrationController::class, "register"])->name("register");
Route::post("/register", [RegistrationController::class, "registerSubmit"])->name("register.submit");


Route::get("/admin", [AdminController::class, "index"])->name("admin")->middleware(["auth"]);
Route::get("/logout", [LoginController::class, "logout"])->name("logout");

// image upload
Route::get("/upload", [ImageController::class, "index"])->name("upload");
Route::post("/upload", [ImageController::class, "submit"])->name("upload.submit");
Route::delete("/delete/{id}", [ImageController::class, "delete"])->name("image.delete");

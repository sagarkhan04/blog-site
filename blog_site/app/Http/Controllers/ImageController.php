<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index() {
        // show upload form
        $images = Image::all();
        return view("frontend.upload", compact("images"));
    }

    public function submit(Request $request) {
        // validate image
        $validated = $request->validate([
            "image" => ["required", "image", "mimes:png,jpg"],
        ]);
        // get image
        $image = $request->file("image");
        // get image extension
        $extension = $image->extension();
        // create image name
        $name = md5(rand(1111, 9999)).".".$extension;
        // move/upload image to path
        $image->move(public_path("image"), $name);
        // insert into database
        Image::create([
            "image" => $name,
        ]);
        return back()->with("success", "Uploaded!");
    }

    // delete image
    public function delete($id) {
        // select image from database by id
        $image = Image::find($id);
        // image path
        $path = public_path("image/".$image->image);
        // delete image from database
        $image->delete();
        // check if image exists
        if (File::exists($path)) {
            // delete and return back
            unlink($path);
            return back()->with("success", "Image deleted!");
        }
        // image not exists, return with error
        return back()->withErrors("Image not found!");
    }
}

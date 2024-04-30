<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MyuserModel;
use App\Models\ProductsModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('website.index');
    }
    public function loginView()
    {
        return view('website.login');
    }

    public function registerView()
    {
        return view('website.register');
    }

    public function registration(Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:myuser",
            "password" => "required|min:8|confirmed",
            "image" => "required"
        ]);

        $data = $request->all();

        if ($request->hasFile("image")) {
            $randname = rand(0000, 9999) . "." . $request->image->extension();
            $path = $request->image->storeAs("image", $randname, "public");
            $data["image"] = "storage/" . $path;
        }

        $data["password"] = Hash::make($request->password);
        $user = MyuserModel::create($data);

        if ($user) {
            auth()->login($user);
            if (auth()->user()->role === "Admin") {
                return redirect()->route("admin.index");
            } else {
                return redirect()->route("index");
            }
        } else {
            return redirect()->route("register")->with("status", "Something went wrong");
        }
    }

    public function logout()
    {
        $user_id = auth()->user()->id;
        $user = MyuserModel::find($user_id);
        auth()->logout($user);
        return redirect()->route("login");
    }

    public function logining(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $user = MyuserModel::where("email", $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);
            if (auth()->user()->role === "Admin") {
                return redirect()->route("admin.index");
            } else {
                return redirect()->route("index");
            }
        } else {
            return redirect()->route("login")->with("status", "Email or Password is wrong");
        }
    }

    public function product_category($category)
    {
        $categoryModel = CategoryModel::where('name', $category)->first();

        if ($categoryModel) {
            
            $products = ProductsModel::where('status', 'Active')
                ->where('category_id', $categoryModel->id)
                ->get();

            return view('website.product')->with('product', $products);
        } else {
            return redirect()->route('index')->with('error', 'Category not found');
        }
    }
}

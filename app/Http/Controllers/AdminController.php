<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use stdClass;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.panel.index');
    }

    public function addCategoryView()
    {
        $category = CategoryModel::all();
        return view('admin.panel.addCategory', compact('category'));
    }

    public function addCategories(Request $request)
    {
        $request->validate([
            "name" => "required",
            "status" => "required"
        ]);
        CategoryModel::create($request->all());
        return redirect()->back()->with("status", "Category added successfully");
    }

    public function deleteCategories($id)
    {
        $category = CategoryModel::find($id);
        $category->delete();
        return redirect()->back()->with("status", "Category deleted successfully");
    }

    public function updateCategories(Request $request, $id)
    {
        $category = CategoryModel::find($id);
        $category->update($request->all());
        return redirect()->back()->with("status", "Category Updated successfully");
    }

    public function addProductView()
    {
        $category = CategoryModel::all();
        return view('admin.panel.addProduct', compact('category'));
    }

    public function product(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "quantity" => "required",
            "image" => "required",
            "status" => "required",
            "category_id" => "required"
        ]);

        $input = $request->all();
        $input["user_id"] = auth()->user()->id;

        if ($request->hasFile('image')) {
            $name = rand(00000, 99999) . "." . $request->image->getClientOriginalExtension();
            $path = $request->image->storeAs("productImage", $name, "public");
            $input['image'] = "storage/" . $path;
        }

        if ($request->hasFile('other_media')) {
            $other_media = [];

            foreach ($request->file('other_media') as $media) {
                $extension = $media->getClientOriginalExtension();
                $obj = new stdClass();

                if (in_array($extension, ["jpg", "png", "jpeg", "gif"])) {
                    $obj->type = "image";
                } elseif (in_array($extension, ["mp4", "avi", "mov", "wmv", "flv"])) {
                    $obj->type = "video";
                } elseif (in_array($extension, ["pdf", "doc", "docx", "txt"])) {
                    $obj->type = "document";
                } else {
                    $obj->type = "other";
                }

                $name = rand(00000, 99999) . '.' . $extension;
                $path = $media->storeAs("productImage", $name, "public");
                $obj->url = "storage/" . $path;

                $other_media[] = $obj;
            }

            $input["other_media"] = json_encode($other_media);
        }


        ProductsModel::create($input);
        return redirect()->back()->with("status", "Product added successfully");
    }
    public function Productdash()
    {
        $product = ProductsModel::all();
        return view('admin.panel.productdash', compact('product'));
    }

    public function status_delete(Request $request)
    {
        $product = ProductsModel::find($request->id);

        if ($product) {
            $product->delete();
            return response()->json(["status" => "product deleted successfully"]);
        } else {
            return response()->json(["status" => "product not found"]);
        }
    }

    public function status_change(Request $request)
    {
        $product = ProductsModel::find($request->id);

        if ($product) {
            if ($product->status == "Active") {
                $product->update(["status" => "Inactive"]);
            } else {
                $product->update(["status" => "Active"]);
            }
            return response()->json(["status" => "product status changed successfully"]);
        } else {
            return response()->json(["status" => "product not found"]);
        }
    }

    public function update_product(Request $request)
    {
        $product = ProductsModel::find($request->id);
        $product->update($request->all());
        
        return response()->json(["status" => "Product Updated successfully"]);
    }
    
}

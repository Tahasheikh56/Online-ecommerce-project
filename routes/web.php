<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// public routes
Route::get('/', [AuthController::class, "index"])->middleware("myAuth")->name("index");

Route::get("/login", [AuthController::class, "loginView"])->name("login");
Route::get("/register", [AuthController::class, "registerView"])->name("register");
Route::get("/product/{category}", [AuthController::class, "product_category"])->name("product");

// protected routes users
Route::name("user.")->prefix("user")->group(function () {
    Route::post("/registration", [AuthController::class, "registration"])->name("registeration");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
    Route::post("/logining", [AuthController::class, "logining"])->name("logining");
});
// protected routes admin
Route::name("admin.")->prefix("admin")->middleware("adminCheck")->group(function () {
    Route::get("/index", [AdminController::class, "index"])->name("index");
    Route::get("/addCategory", [AdminController::class, "addCategoryView"])->name("addCategory");
    Route::post("/addCategories", [AdminController::class, "addCategories"])->name("addCategories");
    Route::get("/deleteCategories/{id}", [AdminController::class, "deleteCategories"])->name("deleteCategories");
    Route::post("/updateCategories/{id}", [AdminController::class, "updateCategories"])->name("updateCategories");
    Route::get("/addProduct", [AdminController::class, "addProductView"])->name("addProduct");
    Route::post("/Productsubmit", [AdminController::class, "product"])->name("product");
    Route::get("/Productdash", [AdminController::class, "Productdash"])->name("Productdash");
    Route::post("/status_delete", [AdminController::class, "status_delete"])->name("status_delete");
    Route::post("/status_change", [AdminController::class, "status_change"])->name("status_change");
    Route::post("/update_product", [AdminController::class, "update_product"])->name("update_product");

});

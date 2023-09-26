<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::prefix("dashboard")->group(function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get("/login", "login")->name("dashboard.login");
        Route::post("/login", "authenticate");
    });

    Route::middleware("auth.admin")->group(function () {
        Route::get("/", function () {
            return view("dashboard.dashboard");
        })->name("dashboard");

        Route::resource("/users", UsersController::class)->parameter("users", "id");
        Route::resource("/supplier", SupplierController::class)->parameter("supplier", "id");
        Route::resource("/product", ProductController::class)->parameter("product", "id");
        Route::resource("/admin", AdminController::class)->parameter("admin", "id");

        Route::get("/logout", [AdminAuthController::class, "logout"])->name("dashboard.logout");
    });
});

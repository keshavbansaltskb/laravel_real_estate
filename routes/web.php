<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Routes 
Route::get("/Admin/login",[Admin::class,"login"]);
Route::post("/Admin/action",[Admin::class,"action"]);
Route::get("/Admin/dashboard",[Admin::class,"dash"]);
Route::get("/Admin/message",[Admin::class,"message"]);
Route::get("/Admin/property",[Admin::class,"property"]);
Route::get("/Admin/uploadimage",[Admin::class,"uploadimage"]);
Route::post("/Admin/uploadnextimage/{code}",[Admin::class,"uploadnextimage"]);
Route::post("/Admin/uploadproperty",[Admin::class,"uploadproperty"]);
Route::get("/Admin/propertyedit/{code}",[Admin::class,"propertyedit"]);
Route::post("/Admin/updateproperty/{code}",[Admin::class,"updateproperty"]);
Route::get("/Admin/propertyview/{code}",[Admin::class,"propertyview"]);
Route::get("/Admin/propertydelete/{code}",[Admin::class,"propertydelete"]);
Route::get("/Admin/changepassword",[Admin::class,"changepassword"]);
Route::post("/Admin/changepass",[Admin::class,"changepass"]);

// Country State City
Route::post("/State",[User::class,"states"]);
Route::post("/City",[User::class,"cities"]);

// Main Site    
Route::get("/",[User::class,"index"]);
Route::get("/propertyview/{code}",[User::class,"propertyview"]);
Route::post("/message/{code}",[User::class,"message"]);
Route::get("/Login",[User::class,"login"]);
Route::get("/logout",[User::class,"logout"]);
Route::post("/loginuser",[User::class,"loginuser"]);
Route::post("/propertlogin/{code}",[User::class,"propertlogin"]);
Route::post("/propertysearch",[User::class,"propertysearch"]);
Route::get("/Edit",[User::class,"Edit"]);
Route::post("/EditProfile",[User::class,"EditProfile"]);
Route::get("/Password",[User::class,"Password"]);
Route::post("/changepass",[User::class,"changepass"]);
Route::get("/Uploadproperty",[User::class,"Uploadproperty"]);
Route::post("/propertyuser",[User::class,"propertyuser"]);
Route::post("/uploadnextimage/{code}",[User::class,"uploadnextimage"]);
Route::get("/demo",[User::class,"demo"]);


// Sign up Check 
Route::post("/Signupcheck",[User::class,"Signupcheck"]);
Route::post("/CodeCheck",[User::class,"CodeCheck"]);

// Contact 
Route::get("/ContactUs",[User::class,"ContactUs"]);
Route::post("/ContactForm",[User::class,"ContactForm"]);
Route::post("/ContactCode",[User::class,"ContactCode"]);
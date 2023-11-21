<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationImageController;
use App\Http\Controllers\PlantDetailController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Payment1Controller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/user/{id}',[UserController::class,"show"]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/createnewloc',[LocationController::class,'create']);
Route::get('/displayloc',[LocationController::class,'show']);
Route::get('/displaylocbyid/{id}',[LocationController::class,'showbyid']);
Route::get('/displaylocwithplant',[LocationController::class,'showwithplantdetail']);


Route::get('/plantdeetdisplay',[PlantDetailController::class,'show']);
Route::post('/newplantdeet',[PlantDetailController::class,'store']);
Route::delete('/plantdetail/delete/{id}',[PlantDetailController::class,"destroy"]);
Route::get('/plantdeetdisplay/{id}',[PlantDetailController::class,'showbyid']);
Route::put('/plantdeet/update/{id}',[PlantDetailController::class,"update"]);





Route::post('/newcontact',[ContactController::class,'store']);
Route::get('/displaycontact',[ContactController::class,'show']);

Route::get('/displaycart/{id}',[CartController::class,'show']);
Route::post('/createcart',[CartController::class,'store']);
Route::delete('/cart/delete/{id}',[CartController::class,"destroy"]);
Route::delete('/cart/deleteall',[CartController::class,"destroyall"]);

Route::get('/razorpay',[PaymentController::class,"index"]);
Route::post('/paymentDetails',[Payment1Controller::class,"store"]);
Route::post('/showpayment',[Payment1Controller::class,"show"]);






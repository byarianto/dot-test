<?php

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

use App\Models\Province;
use App\Models\City;
use Symfony\Component\HttpFoundation\Request;

Route::group(["prefix" => "search"], function(){
    Route::get("/provincies", function (Request $request){
        return Province::where("id", $request->get("id"))->first();
    });

    Route::get("/cities", function (Request $request){
        return City::where("id", $request->get("id"))->first();
    });
    
});
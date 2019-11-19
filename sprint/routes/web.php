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

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Libraries\RajaOngkir;

Route::group(["prefix" => "search"], function(){
    $resourceForm = \env("RESOURCE_FROM");
    Route::get("/provincies", function (Request $request) use ($resourceForm) {
        $id = $request->get("id");
        $response = null;
        if ($resourceForm === "DB") {
            $response =  Province::where("id", $id)->first();
        } else {
            $response =  (new RajaOngkir)->findProvinceById($id);
        }

        return response()->json($response);
    });

    Route::get("/cities", function (Request $request) use ($resourceForm) {
        $id = $request->get("id");
        $response = null;

        if ($resourceForm === "DB") {
            $response = City::where("id", $id)->first();
        } else {
            $response = (new RajaOngkir)->findCityById($id);
        }

        return response()->json($response);
    });
    
});
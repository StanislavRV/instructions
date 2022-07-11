<?php

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



Route::get('/', function () {
    return redirect('/instructions');
})->name('master');


Route::get("/instructions", "\App\Http\Controllers\InstructionController@index")->name("instructions");
Route::post("/instructions", "\App\Http\Controllers\InstructionController@search")->name("search");


Route::middleware('auth')->group(function () {

    Route::get("/create", "\App\Http\Controllers\InstructionController@create")->name("create");
    Route::post("/create", "\App\Http\Controllers\InstructionController@createInstruction")->name("createInstruction");

    Route::get("/create/complaint/{id}", "\App\Http\Controllers\ComplaintController@create")->name("createComplaint");
    Route::post("/create/complaint/{id}", "\App\Http\Controllers\ComplaintController@createComplaintPost")->name("createComplaintPost");
});




Route::middleware('admin')->group(function () {
    Route::get("/delete/complaint/{id}", "\App\Http\Controllers\ComplaintController@delete")->name("deleteComplaint");

    Route::get("/accept", "\App\Http\Controllers\AdminController@index")->name("accept");
    Route::get("/accept/{id}", "\App\Http\Controllers\AdminController@acceptPost")->name("acceptPost");

    Route::get("/delete/{route}/{id}", "\App\Http\Controllers\AdminController@delete")->name("delete");
    Route::get("/banned/{id}", "\App\Http\Controllers\AdminController@banned")->name("banned");


    Route::get("/complaint", "\App\Http\Controllers\ComplaintController@index")->name("complaint");
});

require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeMachineController;


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

// kõik vajalikud päringud, mis on seotud tava-kasutajaga
Route::get("/kohviautomaat", [CoffeeMachineController::class, "index"]);
Route::get("/kohviautomaat/{machine}/decrement", [CoffeeMachineController::class, "decrement"])->name('coffeeMachine.decrement');

// kõik vajalikud päringud, mis on seotud haldajaga
Route::get("/admin", [CoffeeMachineController::class, "admin"])->name('coffeeMachine.admin');
Route::get("/admin/create", [CoffeeMachineController::class, "create"])->name('coffeeMachine.create');
Route::post("/admin/store", [CoffeeMachineController::class, "store"])->name('coffeeMachine.store');
Route::get("/admin/{machine}/increment", [CoffeeMachineController::class, "increment"])->name('coffeeMachine.increment');
Route::delete("/admin/{machine}/delete", [CoffeeMachineController::class, "delete"])->name('coffeeMachine.delete');

Route::get('/', function () {
    return view('welcome');
});


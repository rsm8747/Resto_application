<?php

use App\Http\Controllers\RestoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [RestoController::class, 'welcome']);
// Route::get("/", [RestoController::class,"index"]);
Route::get("/list", [RestoController::class,"list"]);
Route::view('/add','add');
Route::post('/add',[RestoController::class,'add']);
Route::delete('/delete/{id}', [RestoController::class, 'delete']);
Route::patch('/edit/{id}', [RestoController::class,'edit']);

Route::post('/update/{id}', [RestoController::class, 'update']);
// Route::delete('/delete-all', [RestoController::class, 'delete_all']);
Route::delete('/delete-all', [RestoController::class, 'deleteAll']);


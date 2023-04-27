<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactureController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ItemController;
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
    return view('pages.login');
});

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('logged');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/register', [AuthController::class, 'registerPage'])->middleware('logged');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('notlogged');
Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin'])->middleware('unauthorized');
Route::get('/addItem', [ItemController::class, 'addItem'])->middleware('back');
Route::post('/addItem', [ItemController::class, 'addItem']);
Route::get('/updateItem', [ItemController::class , 'updateItem'])->middleware('back');
Route::post('/updateItem', [ItemController::class , 'updateItem']);
Route::get('/deleteItem/{id}', [ItemController::class , 'deleteItem'])->middleware('back');
Route::post('/deleteItem/{id}', [ItemController::class , 'deleteItem']);

Route::get('/facture', [FactureController::class, 'view'])->middleware(['notlogged', 'authorized']);
Route::get('/addFacture', [FactureController::class, 'addFactureItem'])->middleware('back');
Route::post('/addFacture', [FactureController::class, 'addFactureItem']);
Route::get('/updateFacture', [FactureController::class, 'updateFacture'])->middleware('back');
Route::post('/updateFacture', [FactureController::class, 'updateFacture']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('notlogged');

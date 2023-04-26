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

Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login']);


Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'registerPage']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin']);
Route::post('/addItem', [ItemController::class, 'addItem']);
Route::post('/updateItem', [ItemController::class , 'updateItem']);
Route::post('/deleteItem/{id}', [ItemController::class , 'deleteItem']);

Route::get('/facture', [FactureController::class, 'view']);
Route::post('/addFacture', [FactureController::class, 'addFactureItem']);
Route::post('/updateFacture', [FactureController::class, 'updateFacture']);

Route::get('/logout', [AuthController::class, 'logout']);

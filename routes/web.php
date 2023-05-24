<?php

use Illuminate\Support\Facades\DB;
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
    
    try {
        DB::connection()->getPdo();
        $dbStatus = "Connected";
    } catch (\Exception $e) {
        $dbStatus = "Error: " . $e->getMessage();
    }

    return view('welcome', ['dbStatus' => $dbStatus]);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

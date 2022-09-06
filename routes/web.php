<?php

use App\Http\Controllers\OrdersController;
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
    return view('home');
});

//Route::get('/charts', function (){
//    $thisYearOrders = \App\Models\Order::query()
//        ->whereYear('created_at', date('Y'))
//        ->groupByMonth();
//    $lastYearOrders = \App\Models\Order::query()
//        ->whereYear('created_at', date('Y')-1)
//        ->groupByMonth();
//
//    return view('charts', [
//        'thisYearOrders' => $thisYearOrders,
//        'lastYearOrders' => $lastYearOrders
//            ]);
//});

Route::get('/charts', [OrdersController::class, 'index']);
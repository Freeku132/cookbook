<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\StatsController;

use App\Models\Announcement;
use Illuminate\Http\Request;
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

Route::get('/charts', [OrdersController::class, 'index'])->name('charts');

Route::get('/stats', [StatsController::class, 'index'])->name('stats');

Route::get('/announcement', [AnnouncementsController::class, 'index'])->name('announcement');

Route::get('/announcement/edit', [AnnouncementsController::class, 'edit'])->name('edit-announcement');

Route::patch('/announcement/update', [AnnouncementsController::class, 'update'])->name('update-announcement');

Route::post('/upload', function (Request $request){
    if ($request->imageUploadFilePond){
        $path = $request->file('imageUploadFilePond')->store('tmp', 'public');
    }

    return $path;
});


Route::get('/posts', [PostsController::class, 'index'])->name('index-posts');
Route::get('/post/create',[ PostsController::class, 'create']);
Route::post('/post/store', [PostsController::class, 'store']);
Route::get('/post/{post:slug}/edit', [PostsController::class, 'edit'])->name('edit-post');
Route::patch('/post/{post:slug}/update',[PostsController::class, 'update'])->name('update-post');
Route::delete('/post/{id}/delete', [PostsController::class, 'destroy']);
Route::get('/post/{post:slug}', [PostsController::class, 'show'])->name('show-post');



<?php

use App\Http\Controllers\blog\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\UserAccessDashboardMiddleware;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::group(['prefix'=> 'vue', 'middleware' => ['auth',  UserAccessDashboardMiddleware::class]], function () {

//     Route::get('', function () {
//         return view('Vue');
//     })->middleware(['auth'])->name('Vue');
//     Route::get('/save', function () {
//         return view('Vue');
//     });Route::get('/{n1?}/{n2?}/{n3?}', function () { //estos son para argumentos, para a la hora de actualizar no te genere problemas
//         return view('Vue');
//     });
// });


Route::get('/vue', function () {
    return view('Vue');
});
Route::get('/vue/save', function () {
    return view('Vue');
});
Route::get('/vue/{n1?}/{n2?}/{n3?}', function () { //estos son para argumentos, para a la hora de actualizar no te genere problemas
    return view('Vue');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix'=> 'dashboard', 'middleware' => ['auth',  UserAccessDashboardMiddleware::class]], function () {
    Route::resources([
        'post'=> App\Http\Controllers\Dashboard\PostController::class,
        'category'=> App\Http\Controllers\Dashboard\CategoryController::class,
    ]);
    Route::get('', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});

Route::group(['prefix'=> 'blog'], function () {
    Route::get('',[BlogController::class,'index'])->name('blog.index');
    Route::get('detail/{post}',[BlogController::class,'show'])->name('blog.show');
});
require __DIR__.'/auth.php';

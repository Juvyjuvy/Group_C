<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdvertsController;
use App\Http\Controllers\ProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::get('/', function () {
   // return view('welcome');
//});
Route::get('/forgotpassword', function () {
   return view('forgotpassword');
});

Route::get('/admin/adminlogin', function () {
    return view('admin.admin');
});

Route::get('/admin/admindashboard', function () {
    return view('admin.admindashboard');
});


Route::resource('register', RegisterController::class);
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//Route::post('/register', [RegisterController::class, 'store'])->name('register.store');//
Route::post('/user/adverts', [AdvertsController::class, 'store'])->name('/user/adverts.store');


Route::delete('lostitem/items/{Post_ID}', [AdvertsController::class, 'destroy'])->name('items.destroy');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware(['auth','verified'])->group(function (){

     Route::get ('/profile', function () {
     return view('profile');
    });


     Route::get('/dashboard', function () {
        return view('dashboard');
     });

     Route::get('/user/adverts', function () {
     return view('adverts');
     });
     Route::get('/message', function () {
     return view('message');
     });
     Route::get('/lostitem', function () {
        return view('lostitem');
    });


    Route::get('/lostitem', [AdvertsController::class, 'display']);

});

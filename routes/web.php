<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminController;
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


//Admin

Route::get('/admin/lostitemadmin', function () {
    return view('admin/lostitemadmin');
 });
Route::get('/admin/lostitemadmin', [AdvertsController::class, 'admindisplay']);

Route::get('/forgotpassword', function () {
   return view('forgotpassword');
});

Route::get('/admin/adminlogin', function () {
    return view('admin.admin');
});

Route::get('/admin/admindashboard', function () {
    return view('admin.admindashboard');
});




Route::get('/admin/admin', [AdminController::class, 'show'])->name('admin.admin');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.adminlogin');
Route::get('/admin-logout', [AdminController::class, 'adminlogout'])->name('admin-logout');


Route::post('/user/adverts', [AdvertsController::class, 'store'])->name('/user/adverts.store');
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/admin/lost', [AdvertsController::class, 'displayForAdmin'])->name('adminlost');
Route::delete('/admin/lost/{Post_ID}', [AdvertsController::class, 'destroy'])->name('items.destroy');
});
Route::get('admin/lostitemadmin/delete/{id}', [AdvertsController::class, 'destroy']);







//user
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/items/{id}', 'LostFoundItemsController@destroy')->name('items.delete');

Route::resource('register', RegisterController::class);
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

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
     Route::get('/notifications', function () {
     return view('notification');
     });
     Route::get('/lostitem', function () {
        return view('lostitem');
    });
     Route::get('/lostitem', [AdvertsController::class, 'display']);
     Route::get('/lostitem/delete/{id}', [AdvertsController::class, 'destroyForUser']);



    Route::get('admin/lostitemadmin/delete/{id}', [AdvertsController::class, 'destroy']);
});


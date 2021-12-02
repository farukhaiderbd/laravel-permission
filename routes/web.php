<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', function(Request $request){
//    $user = $request->user();
////    dd($user->hasRole('admin','editor'));
////    dd($user->can('permission-slug'));
//    dd($user->hasRole('admin')); //will return true, if user has role
////    dd($user->givePermissionsTo('create-tasks'));// will return permission, if not null
////    dd($user->can('create-tasks'));
//});
//Route::get('/roles', [PermissionController::class,'Permission']);
Route::group(['middleware' => 'role:user'], function() {

    Route::get('/user', function() {
        return 'Welcome...!!';
    });
});



Route::get('/home', [HomeController::class ,'index'])->name('home');
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('dashboard/user/profile', [UserProfileController::class,'index'])->name('user.profile');
Route::post('dashboard/user/user-image-update', [UserProfileController::class,'userByupdateImage'])->name('user.image.update');
Route::post('dashboard/user/user-info-update', [UserProfileController::class,'userByupdateInfo'])->name('user.info.update');

Route::get('dashboard/roles', [PermissionController::class,'roles'])->name('roles');
Route::get('dashboard/add', [PermissionController::class,'roleadd'])->name('role.add');
Route::post('dashboard/insert', [PermissionController::class,'insert'])->name('role.insert');
Route::get('dashboard/edit/{id}', [PermissionController::class,'edit'])->name('role.edit');
Route::get('dashboard/role/delete/{id}', [PermissionController::class,'delete'])->name('role.delete');
Route::post('dashboard/role/update', [PermissionController::class,'update'])->name('role.update');
Route::post('dashboard/permission/update', [PermissionController::class,'permissonupdate'])->name('permission.update');


Route::post('permission/update', 'PermissionController@permissonupdate')->name('permission.update')->middleware('can:edit_role');



Route::get('dashboard/user', [UserController::class,'index'])->name('user.all');
Route::get('dashboard/user/add', [UserController::class,'add'])->name('');
Route::get('dashboard/user/view/{id}', [UserController::class,'view'])->name('user.view');
Route::post('dashboard/user/infoupdate', [UserController::class,'infoupdate'])->name('user.infoupdate');
Route::post('dashboard/user/passupdate', [UserController::class,'passupdate'])->name('user.passupdate');
Route::post('dashboard/user/pictureupdate', [UserController::class,'pictureupdate'])->name('user.pictureupdate');
Route::get('dashboard/user/delete/{id}', [UserController::class,'softdelete'])->name('user.softdelete');
Route::post('dashboard/user/submit', [UserController::class,'submit'])->name('user.submit');

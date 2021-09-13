<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
    return view('/auth/login');
});


Route :: post ('/auth/save',[MainController::class,'save']) -> name('auth.save');
Route :: post ('/auth/checkLogin',[MainController::class,'checkLogin']) -> name('auth.checkLogin');
Route :: get ('/auth/logout',[MainController::class,'logout']) -> name('auth.logout');


Route ::group(['middleware'=>['AuthCheck']],function(){
    Route :: get ('/auth/login',[MainController::class,'login']) -> name('auth.login');
    Route :: get ('/auth/register',[MainController::class,'register']) -> name('auth.register');

    Route :: get ('/admin/dashboard',[MainController::class,'dashboard']);
    Route :: get ('/admin/settings',[MainController::class,'settings']);
    Route :: get ('/admin/profile',[MainController::class,'profile']);
    Route :: get ('/admin/staff',[MainController::class,'staff']);

});
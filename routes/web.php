<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\posts;

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

Route::post('/save',[posts::class, 'save'])->name('aut-save');
Route::post('/check',[posts::class, 'check'])->name('aut-check');
Route::get('/logout',[posts::class, 'logout'])->name('logout');
   
 Route::get('/update',[posts::class, 'update'])->name('update');
    
 


Route::group(['middleware'=>['logincheck']], function(){
   
   Route::get('/admin',[posts::class,'viewadmin']);
    Route::get('/Home',[posts::class, 'Home']);
    Route::get('/setting',[posts::class, 'viewsetting'])->name('setting');
     Route::get('/login',[posts::class, 'index'])->name('aut-login');
    Route::get('/register',[posts::class, 'viewregister'])->name('aut-register');
    Route::get('/delete',[posts::class, 'delete'])->name('delete');
 
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


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
// Route::get('/', function () {
//     return view('admin.login');
// });


// Route::get('/',[HomeController::class,'BIndex']);

Route::get('/login',[AuthController::class,'Login'])->name('login');
Route::Post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/',[HomeController::class,'Index']);




// Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {
Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {
   
    Route::get('/Permission/{UID}',[PermissionController::class,'Index'])->name('.Permission');
    Route::post('/Permission/Save',[PermissionController::class,'Save'])->name('.Permission.Save');
    Route::get('/Permission/Exit',[PermissionController::class,'Exit'])->name('.Permission.Exit');

     Route::get('/Menu/List/{id}',[MenuController::class,'GetData'])->name('.Menu.List');
     Route::get('/Menu/Form/{id}',[MenuController::class,'GetForm'])->name('.Menu.Form');
     Route::post('/Menu/create',[MenuController::class,'store'])->name('.Menu.create');
     Route::get('/Menu/Edit/{id}',[MenuController::class,'Edit'])->name('.Menu.Edit');
     Route::put('/Menu/Update/{id}',[MenuController::class,'Update'])->name('.Menu.Update');
   
//Category
    Route::get('/Category/List/{id}',[CategoryController::class,'GetData'])->name('.Category.List');
    Route::get('/Category/Form/{id}',[CategoryController::class,'GetForm'])->name('.Category.Form');
    Route::post('/Category/create',[CategoryController::class,'store'])->name('.Category.create');
    Route::get('/Category/Edit/{id}',[CategoryController::class,'Edit'])->name('.Category.Edit');
    Route::put('/Category/Update/{id}',[CategoryController::class,'Update'])->name('.Category.Update');
   
//product
    Route::get('/Product/List/{id}',[ProductController::class,'GetData'])->name('.Product.List');
    Route::get('/Product/Form/{id}',[ProductController::class,'GetForm'])->name('.Product.Form');
    Route::post('/Product/create',[ProductController::class,'store'])->name('.Product.create');
    Route::get('/Product/Edit/{id}',[ProductController::class,'Edit'])->name('.Product.Edit');
    Route::put('/Product/Update/{id}',[ProductController::class,'Update'])->name('.Product.Update');

    //USer
     Route::get('/User/List/{id}',[UserController::class,'GetData'])->name('.User.List');
     Route::get('/User/Form/{id}',[UserController::class,'GetForm'])->name('.User.Form');
     Route::post('/User/create',[UserController::class,'store'])->name('.User.create');
     Route::get('/User/Edit/{id}',[UserController::class,'Edit'])->name('.User.Edit');
     Route::put('/User/Update/{id}',[UserController::class,'Update'])->name('.User.Update');

    Route::get('/Sale',[SaleController::class,'Index'])->name('.Sale');
    Route::get('/Sale/SelectMenu/{id}',[SaleController::class,'Select'])->name('.Sale.SelectMenu');
    Route::get('/payment/{total}',[SaleController::class,'Payment'])->name('.payment');
    Route::get('/invoice',[SaleController::class,'Invoice'])->name('.invoice');
    Route::get('/Sale/Cencel',[SaleController::class,'Cencel'])->name('.Sale.Cencel');
    // Route::get('/Sale/Back',[SaleController::class,'Back'])->name('.Sale.Back');
    Route::get('/Sale/Search/{id}',[SaleController::class,'Search'])->name('.Sale.Search');
    Route::get('/Sale/Save/{id}/{qty}/{dis}/{change}/{amount}/{method}/{reKhr}/{reUsd}/{waitNo}/{ReBack}',[SaleController::class,'Save'])->name('.Sale.Save');


    Route::get('/Report',[ReportController::class,'ReportIndex'])->name('.Report');
    Route::get('/Report/Cencel',[ReportController::class,'ReportExit'])->name('.Report.Cencel');
    Route::get('/Report/HReport/{id}',[ReportController::class,'HReport'])->name('.Report.HReport');
    Route::get('/Report/TSReport/{id}',[ReportController::class,'TSReport'])->name('.Report.TSReport');
    Route::get('/Report/SearchDate',[ReportController::class,'SearchDate'])->name('.Report.SearchDate');

});
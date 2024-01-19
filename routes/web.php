<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SousCategoriesController;
use App\Http\Controllers\UtilisateursController;

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::group(["as"=>'admin.'],function(){
    Route::get('/',[UtilisateursController::class,'login'])->name('login');
    Route::post('/auth',[UtilisateursController::class,'authentifier'])->name('authentifier');
    Route::get('/logout', [UtilisateursController::class,'logout'])->name('logout');

});
// route des categories
Route::group([ "prefix"=>'categories',"as"=>'categories.'],function(){
    Route::get('/',[CategoriesController::class,'index'])->name('index');
    Route::get('/create',[CategoriesController::class,'create'])->name('create');
    Route::post('/store',[CategoriesController::class,'store'])->name('store');
    Route::get('/edit/{id}',[CategoriesController::class,'edit'])->name('edit');
    Route::post('/update',[CategoriesController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[CategoriesController::class,'destroy'])->name('destroy');
});
// route des SousCategoriesController

Route::group([ "prefix"=>'sous_categories',"as"=>'sous_categories.'],function(){
    Route::get('/',[SouscategoriesController::class,'index'])->name('index');
    Route::get('/create',[SouscategoriesController::class,'create'])->name('create');
    Route::post('/store',[SouscategoriesController::class,'store'])->name('store');
    Route::get('/edit/{id}',[SouscategoriesController::class,'edit'])->name('edit');
    Route::post('/update',[SouscategoriesController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[SouscategoriesController::class,'destroy'])->name('destroy');
});


<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\SousCategoriesController;
use App\Http\Controllers\TribunalsController;
use App\Http\Controllers\UtilisateursController;
use App\Models\produits;
use App\Models\tribunals;
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
// route des Produits
Route::group([ "prefix"=>'produits',"as"=>'produits.'],function(){
    Route::get('/',[produits::class,'index'])->name('index');
    Route::get('/create',[produits::class,'create'])->name('create');
    Route::post('/store',[produits::class,'store'])->name('store');
    Route::get('/edit/{id}',[produits::class,'edit'])->name('edit');
    Route::post('/update',[produits::class,'update'])->name('update');
    Route::get('/destroy/{id}',[produits::class,'destroy'])->name('destroy');
});
// route des tribunal
Route::group([ "prefix"=>'tribunal',"as"=>'tribunal.'],function(){
    Route::get('/',[TribunalsController::class,'index'])->name('index');
    Route::get('/create',[TribunalsController::class,'create'])->name('create');
    Route::post('/store',[TribunalsController::class,'store'])->name('store');
    Route::get('/edit/{id}',[TribunalsController::class,'edit'])->name('edit');
    Route::post('/update',[TribunalsController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[TribunalsController::class,'destroy'])->name('destroy');
});
// route des fournisseurs
Route::group([ "prefix"=>'Fournisseurs',"as"=>'Fournisseurs.'],function(){
    Route::get('/',[FournisseursController ::class,'index'])->name('index');
    Route::get('/create',[FournisseursController::class,'create'])->name('create');
    Route::post('/store',[FournisseursController::class,'store'])->name('store');
    Route::get('/edit/{id}',[FournisseursController::class,'edit'])->name('edit');
    Route::post('/update',[FournisseursController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[FournisseursController::class,'destroy'])->name('destroy');
});


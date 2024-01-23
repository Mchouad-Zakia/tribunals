<?php

use App\Http\Controllers\AchatsController;
use App\Http\Controllers\BureausController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\SousCategoriesController;
use App\Http\Controllers\StockesController;
use App\Http\Controllers\TribunalsController;
use App\Http\Controllers\UtilisateursController;
use App\Models\produits;
use App\Models\tribunals;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DechargesController;
use App\Http\Controllers\ProduitsController;
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
use App\Http\Controllers\DashboardController;


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index'); // Update the controller name
})->middleware('adminauth');

Route::group(["as"=>'admin.'],function(){
    Route::get('/',[UtilisateursController::class,'login'])->name('login');
    Route::post('/auth',[UtilisateursController::class,'authentifier'])->name('authentifier');
    Route::get('/logout', [UtilisateursController::class,'logout'])->name('logout');
    Route::get('/showProfile/{id}', [UtilisateursController::class,'showProfile'])->name('showProfile');
    Route::post('/editProfile', [UtilisateursController::class,'editProfile'])->name('editProfile');
    Route::get('/ListeUser', [UtilisateursController::class,'ListeUser'])->name('ListeUser');
    Route::get('/adduser', [UtilisateursController::class,'adduser'])->name('adduser');
    Route::post('/storUser', [UtilisateursController::class,'storUser'])->name('storUser');
    Route::get('/edituser/{id}', [UtilisateursController::class,'edituser'])->name('edituser');
    Route::post('/updateuser', [UtilisateursController::class,'updateuser'])->name('updateuser');
    Route::get('/destroy/{id}', [UtilisateursController::class,'destroy'])->name('destroy');


});
// route des categories
Route::group([ "prefix"=>'categories',"as"=>'categories.','middleware'=>['adminauth']],function(){
    Route::get('/',[CategoriesController::class,'index'])->name('index');
    Route::get('/create',[CategoriesController::class,'create'])->name('create');
    Route::post('/store',[CategoriesController::class,'store'])->name('store');
    Route::get('/edit/{id}',[CategoriesController::class,'edit'])->name('edit');
    Route::post('/update',[CategoriesController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[CategoriesController::class,'destroy'])->name('destroy');
});
// route des SousCategoriesController

Route::group([ "prefix"=>'sous_categories',"as"=>'sous_categories.','middleware'=>['adminauth']],function(){
    Route::get('/',[SouscategoriesController::class,'index'])->name('index');
    Route::get('/create',[SouscategoriesController::class,'create'])->name('create');
    Route::post('/store',[SouscategoriesController::class,'store'])->name('store');
    Route::get('/edit/{id}',[SouscategoriesController::class,'edit'])->name('edit');
    Route::post('/update',[SouscategoriesController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[SouscategoriesController::class,'destroy'])->name('destroy');
});
// route des produitsController
Route::group(['prefix' => 'produits', 'as' => 'produits.','middleware'=>['adminauth']], function(){
    Route::get('/', [ProduitsController::class, 'index'])->name('index'); // Update the controller name
    Route::get('/create', [ProduitsController::class, 'create'])->name('create');
    Route::post('/store', [ProduitsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProduitsController::class, 'edit'])->name('edit');
    Route::post('/update', [ProduitsController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [ProduitsController::class, 'destroy'])->name('destroy');
    Route::post('/search', [ProduitsController::class, 'search'])->name('search');
});
// route des tribunal
Route::group([ "prefix"=>'tribunal',"as"=>'tribunal.','middleware'=>['adminauth']],function(){
    Route::get('/',[TribunalsController::class,'index'])->name('index');
    Route::get('/create',[TribunalsController::class,'create'])->name('create');
    Route::post('/store',[TribunalsController::class,'store'])->name('store');
    Route::get('/edit/{id}',[TribunalsController::class,'edit'])->name('edit');
    Route::post('/update',[TribunalsController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[TribunalsController::class,'destroy'])->name('destroy');
});
// route des fournisseurs
Route::group([ "prefix"=>'Fournisseurs',"as"=>'Fournisseurs.','middleware'=>['adminauth']],function(){
    Route::get('/',[FournisseursController ::class,'index'])->name('index');
    Route::get('/create',[FournisseursController::class,'create'])->name('create');
    Route::post('/store',[FournisseursController::class,'store'])->name('store');
    Route::get('/edit/{id}',[FournisseursController::class,'edit'])->name('edit');
    Route::post('/update',[FournisseursController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[FournisseursController::class,'destroy'])->name('destroy');
});
// route des Achat
Route::group([ "prefix"=>'Achat',"as"=>'Achat.','middleware'=>['adminauth']],function(){
    Route::get('/',[AchatsController ::class,'index'])->name('index');
    Route::get('/create',[AchatsController::class,'create'])->name('create');
    Route::post('/store',[AchatsController::class,'store'])->name('store');
    Route::get('/edit/{id}',[AchatsController::class,'edit'])->name('edit');
    Route::post('/update',[AchatsController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[AchatsController::class,'destroy'])->name('destroy');
});
// route des Stock
Route::group([ "prefix"=>'Stock',"as"=>'Stock.','middleware'=>['adminauth']],function(){
    Route::get('/',[StockesController ::class,'index'])->name('index');
    Route::get('/create',[StockesController::class,'create'])->name('create');
    Route::post('/store',[StockesController::class,'store'])->name('store');
    Route::get('/edit/{id}',[StockesController::class,'edit'])->name('edit');
    Route::post('/update',[StockesController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[StockesController::class,'destroy'])->name('destroy');
});

// route des decharge
Route::group(['prefix' => 'Decharges', 'as' => 'Decharges.','middleware'=>['adminauth']], function(){
    Route::get('/', [DechargesController::class, 'index'])->name('index');
    Route::get('/create', [DechargesController::class, 'create'])->name('create');
    Route::post('/store', [DechargesController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DechargesController::class, 'edit'])->name('edit');
    Route::post('/update', [DechargesController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [DechargesController::class, 'destroy'])->name('destroy');
});

// route des Bureaux
Route::group(['prefix' => 'Bureau', 'as' => 'Bureau.','middleware'=>['adminauth']], function(){
    Route::get('/', [BureausController::class, 'index'])->name('index');
    Route::get('/create', [BureausController::class, 'create'])->name('create');
    Route::post('/store', [BureausController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [BureausController::class, 'edit'])->name('edit');
    Route::post('/update', [BureausController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [BureausController::class, 'destroy'])->name('destroy');
});

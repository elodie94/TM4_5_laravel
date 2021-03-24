<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ResetMdpController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\RegisterUserController;



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

//page principale en racine
Route::get('/', function () {
    return view('main');
});

//page home
Route::view('/home','home')->middleware('auth');
// ou
//Route::get('/home', [HomeController::class,'index'])->middleware('auth');

//route pour l'administrateur
Route::view('admin','admin.admin_home')->middleware('auth')
    ->name('admin.home')->middleware('is_admin');

//routes pour connexion et déconnexion de l'utilisateur
Route::get('/login', [AuthenticatedSessionController::class,'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store']);
Route::get('/logout', [AuthenticatedSessionController::class,'destroy'])
    ->name('logout')->middleware('auth');

//routes pour s'enregistrer
Route::get('/register', [RegisterUserController::class,'create'])
    ->name('register');
Route::post('/register', [RegisterUserController::class,'store']);

Route::get('/user/{id}/edit', [ResetMdpController::class,'edit'])
    ->name('edit');
Route::put('/user/{id}/edit', [ResetMdpController::class,'update']);


//route pour afficher la liste de pizza
Route::get('/pizzas',[PizzaController::class,'index'])->middleware('auth')->name('pizzas.index');

Route::get('/pizzas/listpaginate',[PizzaController::class,'pizzasListPaginate'])->middleware('auth')->name('pizzas.list_paginate');

//routes pour créer/ajouter une nouvelle pizza
Route::get('/pizzas/create',[PizzaController::class,'create'])->middleware('auth')
    ->name('pizzas.create')->middleware('is_admin');
Route::post('/pizzas/create',[PizzaController::class,'store'])->name('pizzas.store');

//routes pour modifier les pizzas
Route::get('/pizzas/{id}/edit',[PizzaController::class,'edit'])->middleware('auth')
    ->name('pizzas.edit')->middleware('is_admin');
Route::put('/pizzas/{id}/edit',[PizzaController::class,'update'])->name('pizzas.update');

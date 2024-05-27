<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AdminController;

//画面遷移
Route::get('/', [TopController::class,'index'])->name('index');

Route::get('/login', [TopController::class,'login'])->name('login');

Route::get('/register', [TopController::class,'register'])->name('register');

Route::get('/recipes', [TopController::class,'search'])->name('recipes.search');

Route::get('/recipes/search', [TopController::class,'recipes'])->name('recipes');

Route::get('/create', [TopController::class,'create'])->name('create')->middleware('auth');

Route::get('/contact', [TopController::class,'contact'])->name('contact');

Route::get('/favorites', [TopController::class,'favorites'])->name('favorites')->middleware('auth');

Route::get('/mypage', [TopController::class,'mypage'])->name('mypage')->middleware('auth');

Route::get('/profile_edit', [TopController::class,'profile_edit'])->name('profile_edit');

Route::get('/recipe/{id}', [TopController::class,'recipe'])->name('recipe');

Route::get('/myrecipes', [TopController::class,'myrecipes'])->name('myrecipes');

Route::get('/edit', [TopController::class,'edit'])->name('edit');

Route::get('/myrecipe_rakudo/{id}', [TopController::class,'myrecipe_rakudo'])->name('myrecipe_rakudo');

Route::get('/terms', [TopController::class,'terms'])->name('terms');

Route::get('/privacy_policy', [TopController::class,'privacy_policy'])->name('privacy_policy');

Route::get('/faq', [TopController::class,'faq'])->name('faq');

// ユーザー登録
Route::post('/register', [UserController::class,'register'])->name('register');

Route::post('/login', [UserController::class,'login'])->name('login');

Route::post('/logout', [UserController::class,'logout'])->name('logout');

Route::post('/update', [UserController::class,'update'])->name('update');

// レシピ投稿処理
Route::post('/recipe/store', [RecipeController::class,'store'])->name('recipe.store');

// レシピ評価
Route::post('/recipe/evaluate', [RecipeController::class,'evaluate'])->name('recipe.evaluate')->middleware('auth');

Route::delete('/recipe/delete/{recipe_id}', [RecipeController::class,'delete'])->name('recipe.delete');

Route::get('/edit/{id}', [RecipeController::class,'edit'])->name('edit');
Route::post('/edit_store/{id}', [RecipeController::class,'edit_store'])->name('edit_store');

//ユーザー削除
Route::delete('/user/delete', [UserController::class,'delete'])->name('user.delete');

// 管理者用
Route::get('/admin1016', [AdminController::class,'admin1016'])->name('admin1016')->middleware('auth');

Route::post('/contact.store', [AdminController::class,'store'])->name('contact.store');
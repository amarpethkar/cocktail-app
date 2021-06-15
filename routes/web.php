<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchIngredient;
use App\Http\Controllers\ingredientList;
use App\Http\Controllers\ingredientCocktails;
use App\Http\Controllers\makeCocktail;
use App\Http\Controllers\allCocktails;


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

Route::get('/ingredientList', function () {
    return view('ingredientList');
});


// Search ingredient route 
Route::post('/get-ingredient', [searchIngredient::class, 'getIngredient']);

// Get ingredient list route 
Route::post('/get-ingredient-list', [ingredientList::class, 'getIngredientList']);

// Get Cocktail list route
Route::get('/cocktailList/{name}',[ingredientCocktails::class,'index']);

// Get Cocktail make route
Route::get('/cocktailMake/{id}',[makeCocktail::class,'index']);

// Get all Cocktail route
Route::get('/allCocktailList/{char}',[allCocktails::class,'index']);
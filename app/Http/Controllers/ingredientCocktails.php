<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ingredientCocktails extends Controller
{
    public function index($name)
    {       
        $apiResponse = Http::get('https://www.thecocktaildb.com/api/json/v1/1/filter.php?i='.$name)->body();
        $apiResponse = json_decode($apiResponse, true);
        $apiResponse = $apiResponse["drinks"];
        if(!empty($apiResponse)){
         return view('cocktailList')->with('cocktails', $apiResponse );
        } else {
            return array('status' => 'empty', 'apiResponse' => null);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class allCocktails extends Controller
{
    public function index($char)
    {       
        $apiResponse = Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?f='.$char)->body();
        $apiResponse = json_decode($apiResponse, true);
        $apiResponse = $apiResponse["drinks"];
        if(!empty($apiResponse)){
         return view('allCocktailList')->with('cocktailList', $apiResponse );
        } else {
            return array('status' => 'empty', 'apiResponse' => null);
        }
    }
}

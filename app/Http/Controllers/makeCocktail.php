<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class makeCocktail extends Controller
{
    public function index($id)
    {       
        $apiResponse = Http::get('www.thecocktaildb.com/api/json/v1/1/lookup.php?i='.$id)->body();
        $apiResponse = json_decode($apiResponse, true);
        $apiResponse = $apiResponse["drinks"];
        if(!empty($apiResponse)){
         return view('makeCocktail')->with('cocktailDetails', $apiResponse );
        } else {
            return array('status' => 'empty', 'apiResponse' => null);
        }
    }
}

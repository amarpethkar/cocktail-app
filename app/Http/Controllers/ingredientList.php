<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ingredientList extends Controller
{
    public function getIngredientList()
    {
        $apiResponse = Http::get('https://www.thecocktaildb.com/api/json/v1/1/list.php?i=list')->body();
        $apiResponse = json_decode($apiResponse, true);
        $apiResponse = $apiResponse["drinks"];
        // check is api responce empty
        if(!empty($apiResponse)){
           return array('status' => 'success', 'apiResponse' => $apiResponse);
        } else {
            return array('status' => 'empty', 'apiResponse' => null);
        }
        
    }
}

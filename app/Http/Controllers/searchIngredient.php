<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class searchIngredient extends Controller
{
    public function getIngredient(Request $request)
    {
        $data = $request->all();
        $data['name'] = strtoupper(trim($data['name']));
        $apiResponse = Http::get('https://www.thecocktaildb.com/api/json/v1/1/search.php?i='.$data['name'])->body();
        $apiResponse = json_decode($apiResponse, true);
        $apiResponse = $apiResponse["ingredients"];
        // check is api responce is empty
        if(!empty($apiResponse)){
           return array('status' => 'success', 'apiResponse' => $apiResponse);
        } else {
            return array('status' => 'empty', 'apiResponse' => null);
        }
        
    }
}

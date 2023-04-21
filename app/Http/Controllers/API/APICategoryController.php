<?php

namespace App\Http\Controllers\API;

use App\Models\Categorie_salle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APICategoryController extends Controller
{
    //
    public function categories(){

        $categories = Categorie_salle::all();

        $categoryArray = [];

        for($i = 0; $i < count($categories); $i++){
            $categoryArray[$i] = $categories[$i];
        }

        return response()->json(['categories' => $categoryArray]);
    }

    public function category(Request $request){
        $request->validate([
            'id' => 'required|integer'
        ]);

        $id = $request->input('id');

        $category = Categorie_salle::all()->where('cat_id', $id)->first();

        if($category == null){
            return response()->json(['error' => 'Invalid category id', 'code' => "0"], 204);
        }

        return response()->json(['category' => $category, 'code' => "1"]);
    }
}

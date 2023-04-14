<?php

namespace App\Http\Controllers;

use App\Models\Categorie_salle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function categories(){

        $categories = Categorie_salle::all();

        return response()->json(['categories' => $categories, 'code' => "1"]);
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

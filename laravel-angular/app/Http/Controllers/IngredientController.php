<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{

    public function show()
    {
        return Ingredient::all();
    }
    
    public function create(Request $request){
        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
        $ingredient->quantity = $request->quantity;
        $ingredient->measure = $request->measure;

        $ingredient->save();
    
        echo json_encode(true);exit;
    }
    
    
    public function update(Request $request){
        $ingredient = new Ingredient();
        $ingredient->id = $request->id;
        $ingredient->name = $request->name;
        $ingredient->quantity = $request->quantity;
        $ingredient->measure = $request->measure;
    
        $ingredient->save();
    
        echo json_encode(true);exit;
    }
}
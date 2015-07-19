<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class IngredientController extends Controller
{

    public function show()
    {
        return Ingredient::all();
    }
    
    public function create(Request $request){
        
        if(!$this->isUnique($request->name)){
            return Response::create("This already exists", 400);
            exit;
        }
        
        $ingredient = new Ingredient();
        $ingredient->name = $request->name;
        $ingredient->quantity = $request->quantity;
        $ingredient->measure = $request->measure;

        $ingredient->save();
    
        echo json_encode(true);exit;
    }
    
    private function isUnique($name){
        $data = DB::table('ingredients')->where('name', $name)->get();
        
        return empty($data);
    }
    
    
    public function update(Request $request){
        
        if(!$this->isUnique($request->name)){
            return Response::json("This ingredient already exists", 400);
            exit;
        }
        $recipe = Ingredient::find($request->id);
        
        $ingredient->name = $request->name;
        $ingredient->quantity = $request->quantity;
        $ingredient->measure = $request->measure;
    
        $ingredient->save();
    
        echo json_encode(true);exit;
    }
}
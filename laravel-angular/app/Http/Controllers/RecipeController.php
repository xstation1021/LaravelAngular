<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\RecipeIngredient;
use DB;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function show($search = null)
    {
        $query = DB::table('recipes')
            ->leftJoin('recipe_ingredients', 'recipes.id', '=', 'recipe_ingredients.recipe_id')
            ->leftJoin('ingredients', 'recipe_ingredients.ingredient_id', '=', 'ingredients.id')
            ->leftJoin('products', 'products.ingredient_id', '=', 'ingredients.id')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->groupBy('recipes.id')
            ->select('recipes.*', 'ingredients.name as iname');
        
        if(!empty($search)){
            $query->orWhere('recipes.code', $search);
            $query->orWhere('ingredients.name', $search);
            $query->orWhere('categories.name', $search);
        }

            $data = $query->get();

        return $data;
    }
    
    public function get($id){
        $recipe = Recipe::find($id);
        
        $data = $query = DB::table('recipe_ingredients')
        ->leftJoin('ingredients', 'recipe_ingredients.ingredient_id', '=', 'ingredients.id')
        ->where('recipe_ingredients.recipe_id', $id)
        ->select('recipe_ingredients.id as ri_id', 'recipe_ingredients.unit', 'ingredients.id')->get();
        $recipe->ingredients = $data;
        
        return $recipe;
    }
    
    public function searchByCode($code = null){
        $query = DB::table('recipes')
        ->leftJoin('recipe_ingredients', 'recipes.id', '=', 'recipe_ingredients.recipe_id')
        ->leftJoin('ingredients', 'recipe_ingredients.ingredient_id', '=', 'ingredients.id')
        
        ->select('recipes.*', 'ingredients.name as iname');
        
        if(!empty($code)){
            $query->where('recipes.code', $code);
        }
        
        $data = $query->get();
        
        return $data;
    }
    
    
    
    public function create(Request $request){
        $code = "";
        while(true){
            $code = substr(md5(rand()), 0, 7);
            $data = DB::table('recipes')->where('code', $code)->get;
            if(empty($data)){
                break;
            }
        }
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->serving_size = $request->serving_size;
        $recipe->instructions = $request->instructions;
        $recipe->code = $code;
        $recipe->save();
        
        echo json_encode(true);exit;
    }
    
    public function update(Request $request){
        $recipe = Recipe::find($request->id);
        $recipe->name = $request->name;
        $recipe->prep_time = $request->prep_time;
        $recipe->cook_time = $request->cook_time;
        $recipe->serving_size = $request->serving_size;
        $recipe->instructions = $request->instructions;
        $recipe->save();
        
        foreach($request->ingredients as $item){
            if(isset($item['ri_id'])){
                $recipeIngrediet = RecipeIngredient::find($item['ri_id']);
                $recipeIngrediet->unit = $item['unit'];
                $recipeIngrediet->ingredient_id = $item['id'];
                $recipeIngrediet->save();
            }
            else {
                $recipeIngrediet = new RecipeIngredient();
                $recipeIngrediet->unit = $item['unit'];
                $recipeIngrediet->recipe_id = $request->id;
                $recipeIngrediet->ingredient_id = $item['id'];
                $recipeIngrediet->save();
            }
        }
        echo json_encode(true);exit;
    }
}
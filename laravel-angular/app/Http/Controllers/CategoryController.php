<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class CategoryController extends Controller
{

    public function show()
    {
        return Category::all();
    }
    
    public function create(Request $request){
        
        $category = new Category();
        $category->name = $request->name;

        $category->save();
    
        echo json_encode(true);exit;
    }
    
    public function update(Request $request){
        
        $category = new Category();
        $category->id = $request->id;
        $category->name = $request->name;
    
        $category->save();
    
        echo json_encode(true);exit;
    }
}
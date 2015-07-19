<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{

    public function show()
    {
        
        $data = DB::table('products')
        ->leftJoin('ingredients', 'ingredients.id', '=', 'products.ingredient_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as cname', 'ingredients.name as iname')->get();
        return $data;
    }
    
    public function create(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->ingredient_id = $request->ingredient_id;
        $product->brand = $request->brand;
        $product->measure = $request->measure;
        $product->unit_size = $request->unit_size;
        $product->unit_price = $request->unit_price;
        $product->category_id = $request->category_id;

        $product->save();
    
        echo json_encode(true);exit;
    }
    
    
    public function update(Request $request){
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->ingredient_id = $request->ingredient_id;
        $product->brand = $request->brand;
        $product->measure = $request->measure;
        $product->unit_size = $request->unit_size;
        $product->unit_price = $request->unit_price;
        $product->category_id = $request->category_id;
    
        $product->save();
    
        echo json_encode(true);exit;
    }
}
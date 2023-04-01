<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('product.index',[
            'products' => $products
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('product.create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required|min:3|unique:products,name',
            'description' => 'required|min:4'
        ]);

        try{
            Product::create($validated);
        }catch (\Throwable $th) {    
            abort(500);
        }

        return redirect()->route('product.index')->with('message', 'New Product added !!');
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        if ($product) {
            return view('product.edit', [
                'data' => $product,
                'categories' => $categories
            ]);
        } else {
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Product::findOrFail($id);
        $category->update($validated);

        return redirect()->route('product.index')->with('message', 'Product updated succesfully');
    }

    public function destroy($id)
    {
        $category = Product::findOrFail($id);
        $category->delete();
        return back()->with('message', 'Product deleted !');
    }

    public function get_subcategories(Request $request){
        $category_id = $request->category_id;
        $sub_categories = SubCategory::where('category_id',$category_id)->get();
        $returnView=view('product.sub_categories',compact('sub_categories'))->render();
        return json_encode($returnView);
    }
}

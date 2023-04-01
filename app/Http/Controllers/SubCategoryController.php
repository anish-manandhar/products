<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $sub_categories = SubCategory::paginate(10);
        return view('sub_category.index',[
            'subcategory' => $sub_categories
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('sub_category.create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|min:3|unique:sub_categories,name',
            'description' => 'required|min:4'
        ]);

        try{
            SubCategory::create($validated);
        }catch (\Throwable $th) {    
            abort(500);
        }

        return redirect()->route('subcategory.index')->with('message', 'New SubCategory added !!');
    }

    public function edit($id){
        $sub_category = SubCategory::find($id);
        $categories = Category::all();
        if ($sub_category) {
            return view('sub_category.edit', [
                'data' => $sub_category,
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = SubCategory::findOrFail($id);
        $category->update($validated);

        return redirect()->route('subcategory.index')->with('message', 'SubCategory updated succesfully');
    }

    public function destroy($id)
    {
        $category = SubCategory::findOrFail($id);
        $category->delete();
        return back()->with('message', 'SubCategory deleted !');
    }
}

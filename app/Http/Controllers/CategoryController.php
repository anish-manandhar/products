<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('category.index',[
            'category' => $categories
        ]);
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:categories,name',
            'description' => 'required|min:4'
        ]);

        try{
            Category::create($validated);
        }catch (\Throwable $th) {    
            abort(500);
        }

        return redirect()->route('category.index')->with('message', 'New Category added !!');
    }

    public function edit(Category $category){
        if ($category) {
            return view('category.edit', [
                'data' => $category,
            ]);
        } else {
            abort(403);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect()->route('category.index')->with('message', 'Category updated succesfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('message', 'Category deleted !');
    }
}

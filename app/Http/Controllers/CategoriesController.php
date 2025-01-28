<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::paginate(5);        
        return view("POS.category.category-list", ["categories" => $categories]);
    }    

    public function create()
    {
        return view("POS.category.category-create");

    }

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255'
                ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $category = new Categories();
            $category->name = $request->name;
            $category->user_id = Auth::id();                
            $category->save();
            return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view("POS.category.category-update" , ["category"=> $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

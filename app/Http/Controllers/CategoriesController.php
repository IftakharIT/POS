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
        return view("POS.category.category-list", ["categories"=> Categories::all()]);

    }
    

    public function create()
    {
        return view("POS.category.category-create", [
            "categories"=> Categories::all()
        ]);
    }

    public function store()
    {
        // Code to store a new category
    }

    public function show($id)
    {
        // Code to display a specific category
    }

    public function edit($id)
    {
        // Code to show form for editing a category
    }

    public function update($id)
    {
        // Code to update a specific category
    }

    public function destroy($id)
    {
        // Code to delete a specific category 
    }
}

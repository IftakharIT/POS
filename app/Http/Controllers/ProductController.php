<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage as StorageBase;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator as ValidatorBase;
use Illuminate\Support\Facades\URL as UrlBase;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('POS.product.product-list', compact('products'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('POS.product.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'quantity' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        // Get the original file name
        $originalName = $request->file('image')->getClientOriginalName();

        // Move the file to the public directory and store it with the original name
        $request->file('image')->move(public_path('adminpannel/dist/img'), $originalName);

        // Save the path to the database
        $data['image'] = 'adminpannel/dist/img/' . $originalName;
    }

    Product::create($data);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}


public function edit(Product $product)
    {
        $categories = Categories::all();
        return view('POS.product.edit', compact('product', 'categories'));
    }  

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            // Delete the existing image if it exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
    
            // Get the original file name
            $originalName = $request->file('image')->getClientOriginalName();
    
            // Move the file to the public directory and store it with the original name
            $request->file('image')->move(public_path('adminpannel/dist/img'), $originalName);
    
            // Save the path to the database
            $data['image'] = 'adminpannel/dist/img/' . $originalName;
        }
    
        $product->update($data);
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
        

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

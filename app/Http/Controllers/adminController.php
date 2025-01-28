<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Invoice;
use App\Models\Customer;
use App\Http\Controllers\InvoiceController;

class adminController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        $categories = Categories::all();
        $products = Product::all();
        $invoices = Invoice::all();
        $totalinvoice = Invoice::sum('total_amount'); //total invoice

        return view('admin-dashboard', compact('customers', 'categories', 'products', 'invoices', 'totalinvoice'  ));


    }
}

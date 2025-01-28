<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('invoices.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create($request->only('customer_id', 'invoice_date', 'total_amount'));

        foreach ($request->products as $product) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);

            // Update product quantity
            $productModel = Product::find($product['product_id']);
            $productModel->quantity -= $product['quantity'];
            $productModel->save();
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('items.product');
        return view('invoices.show', compact('invoice'));
    }

    public function print(Invoice $invoice)
    {
        $invoice->load('items.product');
        return view('invoices.print', compact('invoice'));
    }

    public function download(Invoice $invoice)
    {
        $invoice->load('items.product');
        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));
        return $pdf->download('invoice-' . $invoice->id . '.pdf');
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        $products = Product::all();
        $invoice->load('items.product');
        return view('invoices.edit', compact('invoice', 'customers', 'products'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'invoice_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.price' => 'required|numeric|min:0',
        ]);

        $invoice->update($request->only('customer_id', 'invoice_date', 'total_amount'));

        // Restore product quantities
        foreach ($invoice->items as $item) {
            $productModel = Product::find($item->product_id);
            $productModel->quantity += $item->quantity;
            $productModel->save();
        }

        $invoice->items()->delete();

        foreach ($request->products as $product) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);

            // Update product quantity
            $productModel = Product::find($product['product_id']);
            $productModel->quantity -= $product['quantity'];
            $productModel->save();
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        // Restore product quantities
        foreach ($invoice->items as $item) {
            $productModel = Product::find($item->product_id);
            $productModel->quantity += $item->quantity;
            $productModel->save();
        }

        $invoice->items()->delete();
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}

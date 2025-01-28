<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SalesReportController extends Controller
{
    public function showSalesReportForm()
    {
        return view('report.sales-report-form');
    }

    public function downloadSalesReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        $pdf = PDF::loadView('report.sales-report-pdf', compact('invoices', 'startDate', 'endDate'));
        return $pdf->download('sales-report.pdf');
    }

    public function showSalesReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        return view('report.sales-report', compact('invoices', 'startDate', 'endDate'));
    }
}

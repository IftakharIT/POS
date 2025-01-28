<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .bg-success {
            background-color: #28a745;
            color: white;
        }
        .bg-primary {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Sales Report</h1>
    <h2>Summary</h2>
    <table>
        <thead>
            <tr class="bg-success">
                <th style="width: 200px;">Report</th>
                <th>Date</th>
                <th style="width: 150px;">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Sales Report</td>
                <td>{{ $startDate }} to {{ $endDate }}</td>
                <td>{{ $invoices->sum('total_amount') }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Details</h2>
    <table>
        <thead>
            <tr class="bg-primary">
                <th class="text-center" style="width:100px;">Invoice No</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Items</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $key => $invoice)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $invoice->invoice_date }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ $invoice->items->pluck('product.name')->implode(', ') }}</td>
                    <td>{{ $invoice->total_amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
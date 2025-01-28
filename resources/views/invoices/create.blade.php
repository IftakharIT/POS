@extends('dashboard')

@section('title', 'Create Invoice')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold">Create Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-3">
                            <div class="card-body">
                                <form action="{{ route('invoices.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="customer_id">Customer</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="invoice_date">Invoice Date</label>
                                        <input type="date" name="invoice_date" id="invoice_date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="total_amount">Total Amount</label>
                                        <input type="number" name="total_amount" id="total_amount" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="products">Products</label>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="product-list">
                                                <tr>
                                                    <td>
                                                        <select name="products[0][product_id]" class="form-control product-select" onchange="updatePrice(this)">
                                                            <option value="">Select Product</option>
                                                            @foreach($products as $product)
                                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="products[0][quantity]" class="form-control quantity" min="1" oninput="calculateTotal(this)">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="products[0][price]" class="form-control price" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="products[0][total]" class="form-control total" readonly>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger remove-product">Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" id="add-product">Add Product</button>
                                    </div>
                                    <button type="submit" class="btn btn-success">Create Invoice</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    function updatePrice(element) {
        const row = element.closest('tr');
        const price = element.options[element.selectedIndex].getAttribute('data-price');
        row.querySelector('.price').value = price;
        calculateTotal(row.querySelector('.quantity'));
    }

    function calculateTotal(element) {
        const row = element.closest('tr');
        const quantity = row.querySelector('.quantity').value;
        const price = row.querySelector('.price').value;
        const total = row.querySelector('.total');
        total.value = quantity * price;

        updateTotalAmount();
    }

    function updateTotalAmount() {
        let totalAmount = 0;
        document.querySelectorAll('.total').forEach(function(total) {
            totalAmount += parseFloat(total.value) || 0;
        });
        document.getElementById('total_amount').value = totalAmount;
    }

    document.getElementById('add-product').addEventListener('click', function() {
        const productIndex = document.querySelectorAll('#product-list tr').length;
        const productRow = `
            <tr>
                <td>
                    <select name="products[${productIndex}][product_id]" class="form-control product-select" onchange="updatePrice(this)">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="products[${productIndex}][quantity]" class="form-control quantity" min="1" oninput="calculateTotal(this)">
                </td>
                <td>
                    <input type="number" name="products[${productIndex}][price]" class="form-control price" readonly>
                </td>
                <td>
                    <input type="number" name="products[${productIndex}][total]" class="form-control total" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-product">Remove</button>
                </td>
            </tr>
        `;
        document.getElementById('product-list').insertAdjacentHTML('beforeend', productRow);
    });

    document.getElementById('product-list').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-product')) {
            e.target.closest('tr').remove();
            updateTotalAmount();
        }
    });
</script>
@endsection

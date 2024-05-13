@extends('layouts.index')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">

                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="card-header">
                        <h4>Customers Product Details
                            <a href="{{ route('customer-product.create') }}" class="btn btn-primary float-end">Add Product</a>
                        </h4>
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-borderd">
                            <thead>

                                
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th> Quantity</th>
                                <th>Per Amount</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($product->groupBy('customer_id') as $customerProducts)
                                @foreach ($customerProducts as $product)
                                    <tr>
                                        {{-- Display customer name only once for all products --}}
                                        @if ($loop->first)
                                            <td rowspan="{{ count($customerProducts) }}">{{ $product->customer->name }}</td>
                                        @endif
                                        {{-- Product details --}}
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->per_amount }}</td>
                                        <td>{{ $product->total_amount }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('customer-product.edit',[$product->id]) }}" class="btn btn-warning ms-2">Edit</a>
                                            <form action="{{ route('customer-product.destroy',[$product->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger ms-1">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

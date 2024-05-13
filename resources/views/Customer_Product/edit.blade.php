@extends('layouts.index')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Add Product
                            <a href="{{ route('customer-product.index') }}" class="btn btn-primary float-end">Go Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h5>Edit Product:</h5>
                        <form action="{{ route('customer-product.update',$product->id) }}" method="post">
                            @method('put')
                            @csrf
                            
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Enter product name" name='productName' value="{{ $product->product_name }}">
                                @error('productName')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="customer" class="form-label">Select Customer:</label>
                                <select class="form-select" id="customer" name="customer">
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach                                    
                                    
                                    @error('customer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                                
                            </div>
                            <div class="mb-2">
                                <input type="number" class="form-control" placeholder="Quantity" id='qty'
                                    name='qty' value="{{ $product->quantity }}">
                                @error('qty')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Per amount" id='per_amt'
                                    name='per_amt' value="{{ $product->per_amount }}">
                                @error('per_amt')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Total" id='tol_amt' name='tol_amt'
                                    value="{{ $product->total_amount}}" readonly>
                                @error('tol_amt')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="available"  {{ $product->status == 'available' ? 'selected' :'' }}>Available
                                    </option>
                                    <option value="unavailable" {{ $product->status == 'unavailable' ? 'selected' : ''}}>
                                        Unavailable</option>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <h2>Select multiples</h2>
                            <div class="mb-2">
                                <label for="customer" class="form-label">Select multiple Customer:</label>
                                <select class="form-select" id="customer" name="multi_customer[]"  data-mdb-select-init multiple>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach                                    
                                    
                                    @error('customer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function TolAmount() {
            var qty = document.getElementById('qty').value;
            var perAmt = document.getElementById('per_amt').value;
            var tol_amt = qty * perAmt;

            document.getElementById('tol_amt').value = tol_amt.toFixed(2);
        }
        document.getElementById('qty').addEventListener('input', TolAmount);
        document.getElementById('per_amt').addEventListener('input', TolAmount);
    </script>
@endsection

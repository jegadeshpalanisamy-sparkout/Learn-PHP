
@extends('layouts.index')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                      
                    </div>
                    <div class="card-body">
                        
                            <table class="table table-striped">
                                <tr>
                                    
                                    <th>Products Name</th>
                                    <th>Customer Name</th>
                                </tr>
                               
                                    @foreach ($all as $name)
                                    <tr>
                                        <td>{{ $name->product_name}}</td>
                                        <td>
                                            @foreach ($name->Customers as $customer)
                                                {{ $customer->name }} <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                

                            </table>
                   
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

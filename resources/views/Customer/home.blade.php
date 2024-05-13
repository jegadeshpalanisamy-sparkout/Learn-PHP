@extends('layouts.index')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
               
                    @if ( session('message'))
                <div class="alert alert-success">{{ session('message') }}</div> 
                    @endif
                
                <div class="card-header">
                    <h4>Customers List
                    <a href="{{ route('customer.create') }}" class="btn btn-primary float-end">Add Customer</a>
                </h4>
                </div>
                <div class="card-body text-center">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Profie picture</th>
                                <th>Action</th>
                                <th>Detailed View</th>
                            </thead>

                       
                        <tbody>
                           {{-- @isset($getCustomerDetails) --}}
                           @foreach ($getCustomerDetails as $customer)
                           <tr>
                               <td>{{ $customer->name }}</td>
                               <td>{{ $customer->phone_number }}</td>
                               <td>{{ $customer->email }}</td>
                               <td>{{ $customer->address }}</td>
                               <td>{{ $customer->gender }}</td>
                               <td>{{ $customer->profile_picture }}</td>
                               {{-- <td>{{ $customer->customer_login_details->username}}</td> --}}
                               {{-- <td>{{ $customer->customer_login_details->password}}</td> --}}
                               {{-- <td>{{ $customer->customer_login_details->ip_address}}</td> --}}
                               {{-- <td>{{ $customer->customer_login_details->last_seen}}</td>  --}}
                               {{-- <td>{{ $customer->customer_login_details->status}}</td> --}}
                               
                               <td class="d-flex">
                                
                                <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-warning ms-3">Edit</a>

                               <form action="{{ route('customer.destroy',$customer->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-1">Delete</button>
                               </form>

                               
                               
                                

                            </td>
                            <td><a href="{{ route('customer.show',$customer->id) }}" class="btn btn-info ms-3">Show</a></td>
                           </tr>
                           @endforeach
                               
                           {{-- @endisset --}}
                           
                            
                                
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
    

    
@endsection

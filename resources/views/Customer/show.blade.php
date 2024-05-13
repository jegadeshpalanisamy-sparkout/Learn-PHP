{{-- @extends('layouts.index') --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                
                    
                    <div class="card-header">
                        <h4>Customer Full Detailed View
                        <a href="{{ route('customer.index') }}" class="btn btn-primary float-end">Go Back</a>
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
                                    <th>User Name</th> 
                                    {{-- <th>Password</th> --}}
                                    <th>IP Address</th>
                                    <th>Last Seen</th>
                                    <th>Status</th>
                                   
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
                                   <td>{{ $customer->customer_login_details->username}}</td> 
                                   {{-- <td>{{ $customer->customer_login_details->password}}</td> --}}
                                   <td>{{ $customer->customer_login_details->ip_address}}</td>
                                   <td>{{ $customer->customer_login_details->last_seen}}</td> 
                                   <td>{{ $customer->customer_login_details->status}}</td>
                                   
                                 
    
                                   
                                   
                                    
    
                               
                               @endforeach
                                   
                               {{-- @endisset --}}
                               
                                
                                    
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
    
</body>
</html>

    

    
{{-- @endsection --}}

@extends('layouts.index')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Add Customer
                            <a href="{{ route('customer.index') }}" class="btn btn-primary float-end">Go Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h5>Customer:</h5>
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Enter name" name='name' value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Phone number" name='phone_number' value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Email" name='email' value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                {{-- <input type="text" row="5" placeholder="address"> --}}
                                <textarea id="address" class="form-control" name="address" placeholder="Enter address" rows="" >{{ old('address')}}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Gender:</label><br>
                                <input type="radio" name="gender" value="male" class="me-2" {{ old('gender') == 'male' ?'checked' : '' }}>Male
                                <input type="radio" name="gender" value="female"class="me-2" {{ old('gender')=='female'?'checked':'' }}>Female
                                <input type="radio" name="gender" value="other" class="me-2" {{ old('gender')=='other'?'checked':'' }}>Other
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture" value="{{ old('profile_picture') }}">
                                @error('profile_picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="active"   {{ old('status')=='active'?'selected':'' }}>Active</option>
                                    <option value="inactive" {{ old('status')=='inactive'?'selected':'' }}>Inactive</option>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <hr>

                            <h5>Customer Login Details:</h5>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Enter user name" name='username' value="{{ old('username') }}">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="password" class="form-control" placeholder="Enter password" name='password' value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" placeholder="Enter IP Address" name='ip_address' value="{{ old('ip_address') }}">
                                @error('ip_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="active"  {{ old('status')=='active'?'selected':'' }}>Active</option>
                                    <option value="inactive"{{ old('status')=='inactive'?'selected':''}} >Inactive</option>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

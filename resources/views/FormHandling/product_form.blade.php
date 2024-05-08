<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</head>
<body>
    
        <div class="controller text-center">
            <h1>Form validation</h1>
            {{-- @if ($errors->any())
            <div class="w-50 text-center m-auto">
                <ul type='none' class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    
                </ul>
            </div
                
            @endif --}}
            
            <form action="{{ route('valitation.store') }}" method="POST">
                @csrf
                <div>
                    <input type="text" placeholder="name" value="{{ old('name') }}" name="name" >
                    @error('name')
                    <div  class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" placeholder="price" value="{{ old('price') }}" name="price" >
                    
                        @error('price')
                          <div  class="text-danger">{{ $message }}</div>  
                        @enderror
                
                </div>
                <div>
                    <input type="text" placeholder="stock" value="{{ old('stock') }}" name="stock" >
                    @error('stock')
                    <div  class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div> 
                    <input type="checkbox" name="is_active"><span>is_active</span>
                    @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>

        </div>
        
   
    
</body>
</html>
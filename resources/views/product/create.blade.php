<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <h1>Product details</h1>
            <input type="text" name="name" placeholder="name"><br>
            <div>
                @if ($errors->has('name'))
                <span style="color: red">{{ $errors->first('name') }}</span>
                    
                @endif

                
            </div>
            <input type="text" name='price' placeholder="price"><br>
            <div>
                @if ($errors->has('price'))
                <span style="color:red">{{ $errors->first('price') }}</span>
                    
                @endif
            </div>
            <input type="submit" value="save">
        </form>
       
    </center>
</body>
</html>
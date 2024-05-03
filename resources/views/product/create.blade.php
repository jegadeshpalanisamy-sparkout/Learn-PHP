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
        <form action="{{ route('store') }}" method="POST">
            @csrf
            @method('post')
            <h1>Product details</h1>
            <input type="text" name="name" placeholder="name">
            <input type="text" name='price' placeholder="price">
            <input type="submit" value="save">
        </form>
       
    </center>
</body>
</html>
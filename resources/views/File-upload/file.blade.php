<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="upload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="doc" >
             {{-- <input type="submit" value="upload file"> --}}
             <button type="submit">Submit</button>
        </form>
        
    </div>
</body>
</html>
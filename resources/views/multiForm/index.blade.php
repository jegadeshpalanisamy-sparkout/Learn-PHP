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
        <h1>Form 1</h1>
        <form action="/multi-form-validation/store" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <div style="color:red">@error('name','form_1')
                {{ $message }}
            @enderror</div>
            <input type="text" name="age" placeholder="age">
            <div style="color:red">@error('age','form_1')
                {{ $message }}
            @enderror</div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <div>
        <h1>Form 2</h1>
        <form action="/multi-form-validation/store" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <div style="color:red">@error('name','form_2')
                {{ $message }}
            @enderror</div>
            <input type="text" name="age" placeholder="age">
            <div style="color:red">@error('age','form_2')
                {{ $message }}
            @enderror</div>
            <button type="submit">Submit</button>

        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>new user register form</title>
</head>

<body>
    <center>
        <h1>Registration form</h1>
        <form action="/queue-send" method="POST">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <span>
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <br><br>
            <input type="email" placeholder="Email" name="email">
            <span>
                @error('email')
                {{ $message }}
            @enderror
            </span>
       
           
            <br><br>
            <button type="submit">sign up</button>
        </form>

    </center>
</body>

</html>

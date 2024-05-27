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
        <h1>Register</h1>
        <br>
        <form action="/auth-store" method="post" >
            @csrf
            <input type="text" name="name" placeholder="user name"><br>
            <input type="text" name="email" placeholder="email"><br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="password" name="password_confirmation" placeholder="confirm password"><br>
            <button type="submit">register</button>
        </form>
       

    </center>
</body>
</html>
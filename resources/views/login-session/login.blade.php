<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body align="center">
    <h1>Login page</h1>
    <div>
        <form action="store" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="password" name="password" placeholder="password"> <br><br>
            <button type="submit">login</button>
        </form>
    </div>
</body>
</html>
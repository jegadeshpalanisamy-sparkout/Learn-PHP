<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    
</head>
<body>
    <center>
        <h1>Login</h1>
        <br>
        @if(session('errors'))
        <div>{{ session('errors')->first() }}</div> <br>
     @endif

        <form action="/auth-login" method="post" >
            @csrf
            <input type="text" name="email" placeholder="email"><br>
            <div>
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <input type="text" name="password" placeholder="password"><br>
            <div>
                @error('password')
                     {{ $message }}
                 @enderror
            </div>
          
            <a href="/auth-create">Register user</a>
            <button type="submit">login</button>
        </form>
       

    </center>
    
</body>
</html>
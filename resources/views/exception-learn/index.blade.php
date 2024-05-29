<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exception Handling</title>
</head>
<body>
    <h1>Enter Member Id:</h1>
    <form action="{{ route('member.search') }}" method="get">
        <input type="text" name='memberId'>
        <button type="submit">search</button>
    </form>
</body>
</html>
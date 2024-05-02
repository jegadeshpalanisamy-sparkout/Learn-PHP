<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello WORLD learinng blade</h1>
    <!-- <h4>hello<?php echo $name ?></h4> or -->
    <h2>hello {{$name}} </h2>

    @if($name=="jegas")

    <p>Hello {{$name}}</p>

    @else

    <p>helo world</p>

    @endif

    {{$age=28}}
    @if($age>18 && $age<60)
        <h1>he age is {{$age}}</h1>
        <h2>he is major</h2>
    @elseif($age<=18)
        <h1>he is minor</h1>
    @else
        <h2>he is senior citiztion</h2>
    @endif

</body>

</html>
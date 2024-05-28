<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <h3>{{ Auth::user()->name }}</h3>
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                             {{ $post->title }}
                        </h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="{{ route('post.index') }}">Go home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
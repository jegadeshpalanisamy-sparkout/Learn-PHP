<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div>
        <center>
            <h3>Welcome {{ Auth::user()->name }}</h3>
            <a href="{{ route('dashboard') }}">Go Back</a>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Users</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description}}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    @can('view', $post)
                                        <a href="{{ route('post.show',$post) }}" class="btn btn-warning">view</a>
                                        
                                    @endcan
                                    @can('delete', $post)
                                         <a href="{{ route('post.delete',$post) }}" class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </center>

    </div>
    
</body>
</html>
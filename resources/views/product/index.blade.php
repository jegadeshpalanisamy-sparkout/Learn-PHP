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
        <h1>product</h1>
        <div><a href="{{ route('index') }}">create new product</a></div>
        @if (session()->has('success'))
            
          <div>
            {{ session('success') }}
          </div>
            
        @endif
        <div>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>price</th>
                </tr>
                @foreach ($getAllProducts as $getAllProducts)
                <tr>
                  <td>{{ $getAllProducts->id }}</td>
                  <td>{{ $getAllProducts->name }}</td>
                  <td>{{ $getAllProducts->price }}</td>
                  <td>
                    <a href="{{ route('edit',['product'=>$getAllProducts]) }}">Edit</a>
                  </td>
                  <td>
                    <form action="{{ route('delete',['product'=>$getAllProducts]) }}" method="post">
                    @csrf
                    @method('delete')
                    {{-- //<a href="{{ route('delete',['id'=>$data]) }}">delete</a> --}}
                    <input type="submit" value="delete">
                  </form>
                  </td>
                </tr>
              @endforeach
            </table>
        </div>
    </center>
</body>
</html>
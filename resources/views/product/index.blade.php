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
        <div>
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>price</th>
                </tr>
                @foreach ($Alldata as $data)
                <tr>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->price }}</td>
                  <td>
                    <a href="{{ route('edit',['product'=>$data]) }}">Edit</a>
                  </td>
                </tr>
              @endforeach
            </table>
        </div>
    </center>
</body>
</html>
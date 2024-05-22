<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pagination learn</title>
    <style>
        .w-5{
            display: none;
        }
    </style>
</head>
<body align="center">
    <h1>Pagination</h1>
    <table border="1" align="center">
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Mail</th>
            <th>Count</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->mail }}</td>
                <td>{{ $book->count }}</td>
            </tr>
        @endforeach
    </table>
    <button>{{ $books->links() }}</button>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container text-center">
        <div>
            <h1>Students Details</h1>
            <h2>View All students</h2>
        </div>
        <div>
            <li><a href="{{ route('student.create') }}">Create Student</a></li>
            <li><a href="{{ route('student.index') }}">All Student</a></li>
        </div>
        @if (session('success'))
            <div class="text-success mt-2">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="text-danger mt-2">{{ session('error') }}</div>
        @endif

        <div class="w-50 m-auto border-1 mt-5">
            <table class="table  table-striped">
                <thead class="bg-secondary text-light">
                    <th>Name</th>
                    <th>age</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody class="">



                    @foreach ($student as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="d-flex ">
                                <div class="ms-4">
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                    </li>

                                </div>
                                <div class="ms-2">
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirm('are you sure to delete this')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger"  value="Delete">
                                    </form>
                                </div>
                                <div class="ms-2">
                                    <a href="{{ route('student.show',$student->id) }}" class="btn btn-success">Details</a>
                                </div>



                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
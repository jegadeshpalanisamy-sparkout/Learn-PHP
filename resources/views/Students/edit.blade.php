<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container text-center">
        @if (session('success'))
            <div class="text-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="text-danger">{{ session('error') }}</div>
        @endif
        <h1>Edit Student details</h1>
        <li><a href="{{ route('student.index') }}">All Student</a></li>
        <form action="{{ route('student.update',['student'=>$student->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <input type="text" placeholder="Enter a name" value="{{ $student->name }}" name='name'>
                <div>
                    @if ($errors->has('name'))
                        <span style="color: red">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>
            <div class="form-group mt-3">
                <input type="text" placeholder="Enter a age" name='age' value="{{ $student->age }}">
                <div>
                    @if ($errors->has('age'))
                        <span style="color: red">{{ $errors->first('age') }}</span>
                    @endif

                </div>
            </div>
            <div class="form-group mt-3">
                <input type="email" placeholder="Enter email" name='email' value="{{ $student->email }}">
                <div>
                    @if ($errors->has('name'))
                        <span style="color: red">{{ $errors->first('email') }}</span>
                    @endif

                </div>
            </div>
         

         

            <div >
                <input type="submit" class="mt-3 btn btn-primary" value="update">
            </div>

        </form>
    </div>
</body>

</html>

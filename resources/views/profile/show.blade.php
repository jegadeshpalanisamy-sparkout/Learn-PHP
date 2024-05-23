<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<body>
   <div>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Profile picture</th>
        </tr>
        @foreach ($profile as $profile)
        <tr>
            
                <td>{{ $profile->name }}</td>
                {{-- <td>{{ asset($profile->profile_picture)}}</td> --}}
                <td>
                    <img src="{{ Storage::disk('profile_picture')->url($profile->profile_picture) }}" alt="Profile Picture">
                </td>
                
            
        </tr>
        @endforeach
    </table>
   </div>
</body>
</html>
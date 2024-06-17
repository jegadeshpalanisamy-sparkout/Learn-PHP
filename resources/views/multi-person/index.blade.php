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

        @foreach ($persons as $person)
            <a href="{{ route('parent', ['parent' => $person->person_name]) }}">
                <input type="button" value="{{ $person->person_name }}"></input>
            </a>
        @endforeach
        @if (isset($getParent))

            <div id="output">
                <ul>
                    @foreach ($getParent as $child)
                        <ul type="none">
                            <li>{{ $child->person_name }}</li>
                        </ul>
                    @endforeach
                </ul>

            </div>
        @endif

        {{-- @foreach ($persons as $person)
            <details >
                <summary>{{ $person->person_name }}</summary>
                <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
            </details>
        @endforeach --}}

        

    </center>



</body>

</html>

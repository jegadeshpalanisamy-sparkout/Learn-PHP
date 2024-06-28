<!-- resources/views/persons/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Persons Tree</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    /* .person-node {
        margin-left: 20px;
        /* border: 1px solid; */
     */

     .person-node {
    display: inline-block;
    margin: 10px;
    padding: 5px 10px;
    border: 1px solid #000;
    border-radius: 50%;
    text-align: center;
}

.person-node:first-child {
    margin-left: 0;
}

.person-node:nth-child(even) {
    transform: translateY(-50px); /* Adjust vertical spacing */
}

.person-node:nth-child(odd) {
    transform: translateY(50px); /* Adjust vertical spacing */
}

.person-node:nth-child(3n+1) {
    transform: translateX(0);
}

.person-node:nth-child(3n+2) {
    transform: translateX(120px) rotate(60deg); /* Adjust spacing and rotation */
}

.person-node:nth-child(3n+3) {
    transform: translateX(120px) rotate(-60deg); /* Adjust spacing and rotation */
}

</style>
<body>
    

        {{-- <ul>
            @foreach ($persons as $person)
                <li>
                    {{ $person->person_name }}
                    <button onclick="loadChildren({{ $person->id }})">Show Children</button>
                    <ul id="children-{{ $person->id }}"></ul>
                </li>
            @endforeach
        </ul>
     --}}
    {{-- <script>
        function loadChildren(id) {
            $.ajax({
                url: '/children/' + id,
                type: 'GET',
                success: function(children) {
                    let list = $('#children-' + id);
                    list.empty();
                    // console.log(children);
                    children.forEach(function(child) {
                        // console.log(child);
                        list.append('<li>' + child.person_name +
                            ' <button onclick="loadChildren(' + child.id +
                            ')">Show Children</button>' +
                            '<ul id="children-' + child.id + '"></ul></li>');
                    });
                }
            });
        }
    </script> --}}

    {{-- @foreach($persons as $person)
    <div class="person-node">
        {{ $person->person_name }}
        @if($person->children->count())
            @foreach($person->children as $child)
                @include('persons.partials.person', ['person' => $child])
            @endforeach
        @endif
    </div>
@endforeach --}}


{{-- @foreach($persons as $person)
    @php
        function loadPerson($person) {
            echo '<div class="person-node">';
            echo $person->person_name;
            if ($person->children->count()) {
                foreach ($person->children as $child) {
                    loadPerson($child);
                }
            }
            echo '</div>';
        }
    
        loadPerson($person); 
    @endphp
@endforeach --}}
@foreach($persons as $person)
    @php
        function loadPerson($person, $depth = 0) {
            $indent = $depth * 20; // Adjust indentation as needed
            echo '<div class="person-node" style="margin-left: '.$indent.'px">';
            echo $person->person_name;
            if ($person->children->count()) {
                foreach ($person->children as $child) {
                    loadPerson($child, $depth + 1);
                }
            }
            echo '</div>';
        }
    
        loadPerson($person); 
    @endphp
@endforeach

</body>
</html>
<!-- resources/views/persons/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Persons Tree</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    

        <ul>
            @foreach ($persons as $person)
                <li>
                    {{ $person->person_name }}
                    <button onclick="loadChildren({{ $person->id }})">Show Children</button>
                    <ul id="children-{{ $person->id }}"></ul>
                </li>
            @endforeach
        </ul>
    
    <script>
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
    </script>
</body>

</html>

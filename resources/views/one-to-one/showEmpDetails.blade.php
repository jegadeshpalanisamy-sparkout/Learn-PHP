<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</head>
<body>
    <div class="controller">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-head">
                        <h3>Employe details</h3>
                    </div>
                    <div class="card-body">
                       <h6>Name: {{ $employe->name }}</h6>
                       <h6> Phone:{{ $employe->phone->phone }}</h6>                       
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
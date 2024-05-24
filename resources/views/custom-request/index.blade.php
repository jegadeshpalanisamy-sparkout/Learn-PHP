<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</head>
<body>
    <div class="container">
        <form action="/custom-req-store" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Enter product name:</label>
                <input type="text" name="name" class="form-control">
                <div class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Enter price:</label>
                <input type="number" name="prize" class="form-control">
                
                    @error('prize')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
              
            </div>
            <div class="form-group">
                <label for="">Enter qty:</label>
                <input type="number" name="qty" class="form-control">
                
                    @error('qty')
                    <div class="text-danger">
                        {{ $message }}
                    </div> 
                    @enderror
                
            </div>

            <button type="submit" class="btn btn-primary mt-2">Store</button>
        </form>
    </div>
</body>
</html>
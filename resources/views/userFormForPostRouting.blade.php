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
        <div>
            <form action="<?=url('get-data')?>" method="POST">
                <h1>Send User information to post route</h1><br>
                <input type="text" placeholder="name" name="name"> <br>
                <input type="text" placeholder="age" name="age"><br>
                <input type="text" placeholder="mob no" name="mob_no"><br>
                <input type="hidden" name="_token" value="<?=csrf_token()?>">
                <input type="submit" value="submit" ><br>

            </form>
           
        </div>
    </center>
</body>
</html>
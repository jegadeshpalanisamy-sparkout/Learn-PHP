<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?=session('msg')?>
    <form action="<?=url('getAll')?>" method="POST">
    <input type="text" placeholder="text1" name="txt1"><input type="text" placeholder="txt2" name="txt2">
    <input type="hidden" name="_token" value=" <?=csrf_token()?>">
    <input type="submit" value="send">
</form>

</body>
</html>
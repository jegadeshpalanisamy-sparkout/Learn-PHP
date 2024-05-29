<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Dom</title>
</head>
<body>
   <p id="demo"></p>
<script>
    

    const newElement=document.createElement('h1');
    newElement.innerText="hii welcome";
    document.body.appendChild(newElement);

</script>
</body>
</html>
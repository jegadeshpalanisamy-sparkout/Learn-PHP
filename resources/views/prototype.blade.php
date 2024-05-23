<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
        function user(name,age)
        {
            this.name=name;
            this.age=age;
        }

        user.prototype.details=function()
        {
            console.log("hii user name is:"+this.name+" and age is:"+this.age);
        }
        var user1 = new user('jega', 21);
        user1.details();
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hii</h1>
<script>
let person={
    firstName:'arun',
    lastName:'kumar',
    fullname:function(place){
        console.log('hii am '+this.firstName+this.lastName+' from:'+place);
    }
};
let person2={
    firstName:'jega',
    lastName:'desh'
}

person.fullname.call(person2,'tirupur'); 

person.fullname.apply(person2,['coimbatore']);//this apply method passing argument to array format

let bindDemo= person.fullname.bind(person2);//this bind method return function
console.log(bindDemo('chennai'));
</script>
</body>
</html>
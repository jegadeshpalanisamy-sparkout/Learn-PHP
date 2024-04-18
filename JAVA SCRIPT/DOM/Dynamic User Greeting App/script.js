const person={
    name:"jega",
    place:"tirupur",
    age:21,
    Work:function(){
        return(`hii am ${this.name} i am from ${this.place} and my age ${this.age} my destination software develoment`)
    }
}
let nameInp=prompt("Enter name");
let placeInp=prompt("Enter place");
let ageInp=prompt("Enter age");

person.name=nameInp;
person.place=placeInp;
person.age=ageInp;

document.write(person.Work());
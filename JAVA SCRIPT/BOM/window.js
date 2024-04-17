// console.log(window.innerHeight);
// console.log(window.innerWidth);
// window.open("https://google.com");
//window.close();
// window.moveTo(50,200);
// window.alert("hii");

console.log(window.screen);//get screen innformation

console.log(screen.availWidth);


console.log(window.location);

// setInterval(() => {
//     window.location.href="https://www.google.com";
// }, 3000);

function newDoc(){
    window.location.assign("https://www.w3schools.com");
}

// window.history.back;

function goback()
{
    window.history.back();
}

console.log(navigator.javaEnabled()) ;
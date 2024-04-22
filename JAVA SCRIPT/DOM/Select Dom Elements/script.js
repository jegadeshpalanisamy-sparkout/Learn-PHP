//getElementById
function display(){
    const output=document.getElementById("display");
    const input=document.getElementById("inp").value;
    console.log(input);
    //console.log("hii");
    output.innerText=input;
}
//AddEventListener
let btn=document.getElementById('btn');

btn.addEventListener('click',()=>{
    const input=document.getElementById("inp").value;
    let lists=document.getElementById('colorList');
    console.log(lists);
    lists.innerHTML+=`<li class="list">${input}<li/>`;

})

//getElementsByClassName

// let list=document.getElementsByClassName('list');
// console.log(list);

// let allColors=[].map.call(list,(color)=>color.textContent);
// console.log(allColors);

//query selector --it returns node list
const qs=document.querySelector('li');
const qsa=document.querySelectorAll('li');
console.log(qs);
console.log(qsa);


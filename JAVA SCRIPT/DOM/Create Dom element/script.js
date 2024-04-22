
const btn=document.getElementById('btn');
btn.addEventListener('click',()=>{
    const h1=document.createElement('h1');
    const content=document.createTextNode('This is Dom learning');
    h1.append(content);
    document.body.appendChild(h1);

    console.log(h1);
})
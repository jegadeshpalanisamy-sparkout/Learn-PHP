const getEle=document.querySelector(".test .test1");
console.log(getEle.innerText);
console.log(getEle.innerHTML);
console.log(getEle.textContent);


 getEle.innerHTML="<h1 style='display:none'>hii how are you</h1> i am fine";
 getEle.innerText="<h1>hii how are you</h1> i am fine";
 getEle.textContent="<h1 style='display:none'>hii how are you</h1> i am fine";

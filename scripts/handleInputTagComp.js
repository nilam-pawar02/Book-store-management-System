const inputUp = document.querySelectorAll('.input-up');
const placeHolder = document.querySelectorAll('.inp-h3');
const inputTag = document.querySelectorAll('.inp-enter');
inputUp.forEach((inp,index)=>{
    inp.addEventListener('click',()=>{
        placeHolder[index].classList.add('text-sm','top-[-2px]');
        inputTag[index].focus();
    });
});
inputTag.forEach((inp,index)=>{
    inp.addEventListener('keydown',()=>{
        (inp.value.length >=1)? placeHolder[index].classList.add('text-green-500'):'';
    });
});
window.addEventListener('load',()=>{
    // check length of input tags and translate those h3's whos input tag in not empty
    inputTag.forEach((inp,index)=>{
        if(inp.value!= '')
        placeHolder[index].classList.add('text-sm','top-[-2px]');
       
    })
});
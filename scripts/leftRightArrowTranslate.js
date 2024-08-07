const arrowLeft = document.querySelector('.arrow-left');
const arrowRight = document.querySelector('.arrow-right');
const sliderImg = document.querySelector('.slider-imges');
let flag=1;
arrowLeft.addEventListener('click',()=>{
    flag--;
    let t= sliderImg.style.transform=`translateX(-${120*flag}px)`;
    console.log(t);
    if(flag<=1){
        flag=1;
    }
    else if(flag>6)
    flag =6;
// console.log(flag);
});

arrowRight.addEventListener('click',()=>{
    if(flag>7)
        flag=7;
    flag++;
    let a= sliderImg.style.transform=`translateX(-${145*flag}px)`;
//     console.log(flag);
//    console.log(a);

});
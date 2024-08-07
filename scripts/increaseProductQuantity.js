const increment = document.querySelectorAll('.product-plus');
const decrement = document.querySelectorAll('.product-minus');
const quantity = document.querySelectorAll('.product-quantity');

let count =1;
increment.forEach((inc,index)=>{
    inc.addEventListener('click',()=>{
        quantity[index].innerHTML = counterInc();
    })
});
decrement.forEach((dec,index)=>{
    dec.addEventListener('click',()=>{
        if(count>1)
        quantity[index].innerHTML = counterDec();
    })
});

const counterInc = ()=>{
    return  count+=1;
}
const counterDec = ()=>{
    return  count-=1;
}
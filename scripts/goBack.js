const goBack = document.querySelector('.go-back');

goBack.addEventListener('click',()=>{
    if(history.back() == -1)
    window.location.href="http://localhost/bookstore/"; //original
    else
    history.back();
console.log(history)
})
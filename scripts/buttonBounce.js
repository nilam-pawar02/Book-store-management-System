const buttons = document.querySelectorAll('button');

buttons.forEach((button,index)=>{
    button.addEventListener('click',()=>{
        buttons[index].classList.add('button-bounce');
        setTimeout(() => {
            buttons[index].classList.remove('button-bounce');
        }, 500);
    })
})
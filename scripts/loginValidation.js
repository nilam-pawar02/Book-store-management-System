const inputs = document.querySelectorAll('.login-inp');
const button = document.querySelector('.login-button');
const fileWarn = document.querySelector('.login-warn');
button.addEventListener('click',(e)=>{
    if(inputs[0].value.length == 0 || inputs[1].value.length == 0 )
    {
        e.preventDefault();
        fileWarn.classList.replace('hidden','flex');
        
        setTimeout(()=>{
            fileWarn.classList.replace('flex','hidden');

        },3000);
    }
});
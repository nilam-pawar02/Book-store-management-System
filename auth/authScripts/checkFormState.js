window.addEventListener('load',()=>{
    function checkFormState()
{
    const Url = window.location.href;
    const formState = Url.split('#')[1]; 
    if(formState == 'signup')
    {
        flipForms[0].classList.add('hidden');
        flipForms[1].classList.remove('hidden');
        adjustBg.classList.replace("h-screen","h-fit");
    }
    else if(formState == 'signin')
    {
        flipForms[0].classList.remove('hidden');
        flipForms[1].classList.add('hidden');
        adjustBg.classList.replace("h-fit","h-screen");
    }
    console.log(formState);
}
checkFormState();
})

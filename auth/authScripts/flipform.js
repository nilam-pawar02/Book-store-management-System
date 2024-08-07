const flipper = document.querySelectorAll('.flipper');
const flipForms = document.querySelectorAll('.flip-forms');
const adjustBg = document.querySelector('.background-bg');
flipper.forEach((flip,index)=>{
    flip.addEventListener('click',()=>{
        // flipForms.forEach(form=> form.classList.add('hidden'))
        if(index==0)
        {
            flipForms[0].classList.add('hidden');
            flipForms[1].classList.remove('hidden');
              // adjust background
            adjustBg.classList.replace("h-screen","h-fit");
        }
        else
        {
            flipForms[0].classList.remove('hidden');
            flipForms[1].classList.add('hidden');
            adjustBg.classList.replace("h-fit","h-screen");
        }
    })
})

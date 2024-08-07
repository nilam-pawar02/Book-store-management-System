const vpa = document.getElementById('vpa');
const vpaWarning = document.querySelector('.vpa-warning');

const endsWithValidation= ['@ibl','@ybl','@axl'];
payNow.forEach((pay,index)=>{
    pay.addEventListener('click',(e)=>{
        if(index==0)
        {   let found= false;
            // check vpa one by one ends withvalidation
            endsWithValidation.map(end=>{
                // use mordern if else
                if(vpa.value.endsWith(end) && vpa.value.split('@').length ==2 && vpa.value.split('@')[0] != ''){
                    found=true;
                }  
            });
            if(found!=true){
                 vpaWarning.classList.remove('hidden');
                 e.preventDefault();
            } else vpaWarning.classList.add('hidden');
        }
            
    })
})
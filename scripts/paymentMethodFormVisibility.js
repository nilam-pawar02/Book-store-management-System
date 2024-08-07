const paymentMethod = document.querySelectorAll('.pmethod');
const paymentMethodForms = document.querySelectorAll('.payment-form');

paymentMethod.forEach((method,index)=>{
    method.addEventListener('click',()=>{
        paymentMethod.forEach(method=>method.classList.replace('border-black','border-neutral-300'));
        method.classList.replace('border-neutral-300','border-black');
        paymentMethodForms.forEach(method=>method.classList.add('hidden'));
        if(index ==0)
        paymentMethodForms[index].classList.remove('hidden');
        else{
            paymentMethodForms[1].classList.remove('hidden');
        }

    });
});
const submitButton =document.querySelector('.registration-button');
const pwdQuery =document.querySelector('.pwd-query');
const checkPwd = document.querySelectorAll('.c-pwd')

submitButton.addEventListener('click',(e)=>{

    // if pass and conf pass is correct
    if(checkPwd[0].value.length == 0 && checkPwd[1].value.length ==0)
    {
        e.preventDefault();
        pwdQuery.innerHTML = "Password cannot be Empty";
    }
    else
    if(checkPwd[0].value == checkPwd[1].value){
        let frstLetter = checkPwd[0].value.charAt(0);
        let specialCharacters = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '}', '[', ']', '|', '\\', ';', ':', "'", '"', '<', '>', ',', '.', '/', '?'];
        let numbers = [1,2,3,4,5,6,7,8,9,0];
        // if pass 1 first char is not uppercase
        if( frstLetter!= frstLetter.toUpperCase())
        {
            e.preventDefault();
            pwdQuery.innerHTML = "passwords first letter must be capital";
        }
        // check pass 1 contains speacial chars 
        else if (!specialCharacters.some(substring => checkPwd[0].value.includes(substring))) {
            e.preventDefault();
            pwdQuery.innerHTML = "Add some Speacial Characters";
        }
        // check pass 1 contains number
        else if (!numbers.some(substring => checkPwd[0].value.includes(substring))) {
            e.preventDefault();
            pwdQuery.innerHTML = "add atleast one number in password";
        }
        // check pass 1 value must be greater than 8
        else if(checkPwd[0].value.length <8)
        {
            e.preventDefault();
            pwdQuery.innerHTML = "passowrd must be contains 8 letter";
        }
    }
    else
    {
        e.preventDefault();
        console.log('passord not matched');
        pwdQuery.innerHTML="password not matched";
    }
    setTimeout(()=>{
        pwdQuery.innerHTML="";
    },5000)
});
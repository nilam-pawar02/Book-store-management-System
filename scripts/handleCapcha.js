const verifyCaptcha = document.querySelector('.verify-captcha');
const showCapcha = document.querySelector('.captcha-text');
const payNow = document.querySelectorAll('.pay-now');
const captchaWarning = document.querySelector('.captcha-warning');

const alphaUpper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');
const digits="1234567890".split(''); 
const alphaLower ="abcdefghijklmnopqrstuvwxyz".split("");
// generate random captcha
let generatedCaptcha = captchaGen(digits,alphaUpper,alphaLower,digits,alphaLower,alphaUpper);
// show the generated captcha the user
showCapcha.innerHTML= generatedCaptcha;
// console.log(generatedCaptcha);
// 
verifyCaptcha.addEventListener('click',()=>{
    // get UserInputed Captcha
const inputCaptcha = document.querySelector('.inputCaptcha');
    // console.log(generatedCaptcha,inputCaptcha);
       if(generatedCaptcha == inputCaptcha.value)
       {
        //    console.log("Verified");
        // show on button
            verifyCaptcha.innerHTML="verified";
            if(verifyCaptcha.classList.contains('bg-red-500'))
            verifyCaptcha.classList.replace('bg-red-500','bg-green-500');
            verifyCaptcha.classList.replace('bg-black','bg-green-500');
            // when captcha is verified correctly then input tag will be set in readonly mode
            inputCaptcha.setAttribute('readonly',true);
            inputCaptcha.classList.add('cursor-not-allowed')
            // hide captcha warning if it is visible
            captchaWarning.classList.add('hidden');
        
       }
    else
    {   
        // if cpatcha is wrong then regenerate captcha 
        generatedCaptcha = captchaGen(digits,alphaUpper,alphaLower,digits,alphaLower,alphaUpper);
        // show the updated captcha the user
        showCapcha.innerHTML= generatedCaptcha;
        //clear input tag and focus on it
        inputCaptcha.value='';
        inputCaptcha.focus();
        // show captcha warning
        captchaWarning.classList.remove('hidden');
        // show on button
        verifyCaptcha.innerHTML="Not verified";
        if(verifyCaptcha.classList.contains('bg-green-500'))
        verifyCaptcha.classList.replace('bg-green-500','bg-red-500');
        verifyCaptcha.classList.replace('bg-black','bg-red-500');
        setTimeout(()=>{
            verifyCaptcha.innerHTML="verify";
        },1000)
       
    }
    // console.log("Not Verified");

    })
// disable  control shortcuts js
document.addEventListener('keydown', function (e) {
    // Disable Ctrl+C (Cmd+C on Mac) shortcut
    // normal disabling
    if ((e.ctrlKey || e.metaKey) && e.keyCode === 67) {
      e.preventDefault();
    }
    // beast mode
   /* if ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.keyCode === 75 || e.keyCode === 67 || e.keyCode === 90 || e.keyCode === 69)) {
        e.preventDefault();
      }
    
      // Disable Shift+F7, Shift+F5, Shift+F9
      if (e.shiftKey && (e.keyCode === 118 || e.keyCode === 116 || e.keyCode === 120)) {
        e.preventDefault();
      } */
  });
//   using css
  showCapcha.classList.add('disable-select');
//   disable right click
document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
    alert("🙈");
  });
// random captcha generator function
// logic -> get random index of each array
// 2D array
// a[i][Random]
function captchaGen(...param){
    let add='';
        param.forEach((para,i)=>{
            add+=param[i][Math.floor(Math.random()*para.length)]
        })
    return add;
}


// if user not filled  or verify captcha and direclty clicked on payNow
payNow.forEach(pay=>{
    pay.addEventListener('click',(e)=>{
        const inputCaptcha = document.querySelector('.inputCaptcha');
        // console.log(generatedCaptcha,inputCaptcha.value,);
        if(inputCaptcha.value == '' || generatedCaptcha != inputCaptcha.value)
        {
            e.preventDefault();
            captchaWarning.classList.remove('hidden')
            //clear input tag and focus on it
            inputCaptcha.value='';
            inputCaptcha.focus();
        }
    });
})
console.log("Happy Hacking!😈")

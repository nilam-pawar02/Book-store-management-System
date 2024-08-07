const cardNumber= document.getElementById('card_number');
const expiryDate= document.getElementById('expiry_date');
const cardHolderName =  document.getElementById('card_holder_name');
const allFormInputs =  document.querySelectorAll('.f-inp');

// display card info
const dispCardHolderName = document.querySelector('.card-holder');
const dispCardNumber = document.querySelector('.card-number');
const dispExp = document.querySelector('.expiry-date');
const cardImg = document.querySelector('.card-img');
cardNumber.addEventListener('change',()=>dispCardNumber.innerHTML=cardNumber.value)
cardHolderName.addEventListener('change',()=>dispCardHolderName.innerHTML=cardHolderName.value);
expiryDate.addEventListener('change',()=>dispExp.innerHTML=expiryDate.value);

//add '/' in expiry date 
expiryDate.addEventListener('keypress',()=>{
    if(expiryDate.value.length==2)
    expiryDate.value=expiryDate.value+"/"
})

//change credit card imges when user select a paynent method
const methodImges=['upi.png','masterCard.png','visa.png','paypal.png'];
const imgPath= 'assets/CreditCardImges/';
paymentMethod.forEach((method,index)=>{
    method.addEventListener('click',()=>{
        cardImg.setAttribute('src',`${imgPath}${methodImges[index]}`)
    })
});
// autoshifting input tags when they are fill completely
let onlyOneTime = [true,true,true,true,true];
allFormInputs.forEach((input,index)=>{
    input.addEventListener('keydown',()=>{
        let maxlength= allFormInputs[index].getAttribute('maxlength'); 
        if(index==0)
        {
            console.log(onlyOneTime,maxlength);
            if(input.value.length == maxlength && onlyOneTime[index]==true)
            {
                onlyOneTime[index]=false;
                allFormInputs[index+1].focus();
                allFormInputs[index].value += allFormInputs[index+1].value;
            }
        }
        else if(index==1)
        {
            console.log(onlyOneTime,maxlength);
            if(input.value.length==maxlength && onlyOneTime[index]==true)
            {
                onlyOneTime[index]=false;
                allFormInputs[index+1].focus();
            }
        }
        else if(index==2)
        {
            console.log(onlyOneTime,maxlength);
            if(input.value.length==maxlength && onlyOneTime[index]==true)
            {
                onlyOneTime[index]=false;
                allFormInputs[index+1].focus();
            }
        }
    })
})

const increment = document.querySelectorAll('.product-plus');
const decrement = document.querySelectorAll('.product-minus');
const quantity = document.querySelectorAll('.product-quantity');
const cartProducts = document.querySelectorAll('.card-product');
const setNewPriceToBook = document.querySelectorAll('.price-ammount');
const setNewQty = document.querySelectorAll('.product-quantity');
const inc_OR_dec_state = document.querySelectorAll('.product-state');
 
increment.forEach((inc,index)=>{
    inc.addEventListener('click',()=>{
        // let qty=quantity[index].innerHTML= Number(quantity[index].innerText)+1;
        // get current cart product info from their data- attribute and send it as get request in increseBooksQuantity.php page
        let id = cartProducts[index].getAttribute("data-id");
        let price = cartProducts[index].getAttribute("data-price");
        // console.log(price);
        
        // increase and show the value in current book
        let incUrl = "http://localhost/bookstore/ajaxPhp/increaseBooksQty.php?cartId="+id+"&price="+price;
        updateData(incUrl,setNewQty[index],setNewPriceToBook[index]);
        updateTotalSum();
    })
});
decrement.forEach((dec,index)=>{
    dec.addEventListener('click',()=>{
        
        let id = cartProducts[index].getAttribute("data-id");
        let price = cartProducts[index].getAttribute("data-price");
        
        // console.log(price);
        
        // decrease and show the value in current book
        let decUrl = "http://localhost/bookstore/ajaxPhp/decreaseBooksQty.php?cartId="+id+"&price="+price;
        // function only calls when value is greater than 1 because items cannot be negative
        if(Number(quantity[index].innerText)>1)
        {
            updateData(decUrl,setNewQty[index],setNewPriceToBook[index]);
            updateTotalSum();

        }
    })
});

function updateData(URL,set_qty,set_new_price)
{   
    
    const url = URL;
    const xhr = new XMLHttpRequest();
    xhr.open("GET",url,true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = ()=>{
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response data
            const responseData = xhr.responseText;
            const splitResponseData = responseData.split(',');
            // OP: [total_price,qty] 
            set_qty.innerText = splitResponseData[1]; 
            set_new_price.innerText = splitResponseData[0];
            // console.log('Response:', responseData);
        } else if (xhr.readyState === 4) {
            // Handle errors
            console.error('Error:', xhr.status, xhr.statusText);
        }
    
    }
    xhr.send();
}

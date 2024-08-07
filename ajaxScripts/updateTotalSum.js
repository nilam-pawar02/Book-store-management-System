const orderAmmount = document.querySelector('.order-ammount');
const totalPayment = document.querySelector('.total-payment');

function updateTotalSum()
{
    const url = "http://localhost/bookstore/ajaxPhp/updateTotalAmmountOFBooks.php";
    const xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = ()=>{
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response data
            const responseData = xhr.responseText;
            // [total_ammount,with_tax_ammount]
            const splitResponse = responseData.split('WGST');
            orderAmmount.innerText ="₹"+splitResponse[0]
            totalPayment.innerText= "₹"+splitResponse[1] 
            console.log('Response:', responseData);
        } else if (xhr.readyState === 4) {
            // Handle errors
            console.error('Error:', xhr.status, xhr.statusText);
        }
    
    }
    xhr.send();
}
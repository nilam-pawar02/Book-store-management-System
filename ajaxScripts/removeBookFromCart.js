const removeBook = document.querySelectorAll('.remove-book');
const bookContainer = document.querySelectorAll('.card-product');
const cartContainer = document.querySelector('.cart-container');
removeBook.forEach((rmBook,index)=>{
    rmBook.addEventListener('click',()=>{
        const cartId= bookContainer[index].getAttribute('data-id');
        const url = "http://localhost/bookstore/ajaxPhp/deleteFromCart.php";
        deleteBookData(url,cartId,cartContainer);
        updateTotalSum();
        console.log(removeBook);
    });
});

function deleteBookData(URL,deleteBkId,updateCart)
{
    const url = URL;
    const xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = ()=>{
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response data
            const responseData = xhr.responseText;
            updateCart.innerHTML = responseData;
            console.log('Response:', responseData);
        } else if (xhr.readyState === 4) {
            // Handle errors
            console.error('Error:', xhr.status, xhr.statusText);
        }
    
    }
    xhr.send("cartId="+deleteBkId);
}
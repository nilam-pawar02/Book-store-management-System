const buyButton = document.querySelectorAll('.buyButton');
let bookURL = window.location.href.split('?');
let splitBkURL = bookURL[1].split('?');
let id = splitBkURL[0].split('&')[0].split('=')[1];
let bkName = splitBkURL[0].split('=')[2];

buyButton.forEach((buy=>{
    buy.addEventListener('click',()=>{
        if(CheckUserStatus())
        {
            fetchData();
            
                const msg = document.createElement('div');
                msg.classList.add('success-msg','py-2','px-4','bg-black','text-white','rounded-md','w-fit','fixed','top-28','left-1/2','translate-x-[-50%]','translate-y-[-50%]');
                msg.innerHTML = "Product added into cart";
                // console.log(msg)
                document.querySelector('body').append(msg);
                setTimeout(()=>{
                    document.querySelector('body').removeChild(document.querySelector('.success-msg'));
                },4000);
         }
       
        });

}))
// console.log(id,bkName)

    function fetchData()
    {
    // Using XMLHttpRequest
    const url = 'http://localhost/bookstore/ajaxPhp/addToCart.php';
    const data = id;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response data
        const responseData = xhr.responseText;
        // console.log('Response:', responseData);
    } else if (xhr.readyState === 4) {
        // Handle errors
        console.error('Error:', xhr.status, xhr.statusText);
    }
    };

    xhr.send("id="+data);

    }
  
const dashItems = document.querySelectorAll('.dash-items');
const showResult = document.querySelector('.show-dash-result');
dashItems.forEach((itmes,index)=>{
    itmes.addEventListener('click',()=>{
        // console.log(index);
        sendIndexToDashboard(index);
    });
});

function sendIndexToDashboard(id)
{
    const url = "http://localhost/bookstore/auth/authAjaxPhp/handleDashboard.php";
    const xhr = new XMLHttpRequest();
    xhr.open("POST",url,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded')

    xhr.onreadystatechange = ()=>{
        if(xhr.readyState ==4 && xhr.status==200)
        {
            const responseData = xhr.responseText;
            showResult.innerHTML = responseData;
            console.log(responseData);
        }
        else if(xhr.readyState==4)
        {
            console.log("Error:",xhr.status,xhr.statusText);
        }
    }
    xhr.send("index="+id);
}
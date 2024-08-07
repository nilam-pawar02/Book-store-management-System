function CheckUserStatus()
{

const Status = document.querySelector('.userStatus');
// console.log(Status);
if(Status.classList.contains("login"))
    return true;
else
    return false;
}
console.log(CheckUserStatus())
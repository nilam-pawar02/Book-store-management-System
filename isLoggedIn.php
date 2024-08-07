<?php
function isloggedIn()
{
    include 'connect.php';
    $userid = $_COOKIE['userId'];
    $browser = $_COOKIE['user_agent'];
// get user if mockid and browser and checks its islogged in status is 1 or not 
// if user islogged in means 1 then return true else false  
$sql = "SELECT * FROM authentication WHERE authentication.userId = $userid AND authentication.browser = '$browser' ORDER BY `authentication`.`id` DESC";

$result = mysqli_query($conn,$sql);

if($result)
{
    $row = mysqli_fetch_assoc($result);
    $isLogged = $row['isLoggedIn'];
    if($isLogged == 1)
    {
        return true;
    }
    else
    return false;
}
else
{
    return false;
}
}
// var_dump(isloggedIn());
?>
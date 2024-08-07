<?php
include 'connect.php';
$userId = $_COOKIE['userId'];
$browser = $_COOKIE['user_agent'];
$sql = "UPDATE `authentication` SET `isloggedIn`= 0 WHERE authentication.userId= $userId AND authentication.browser= '$browser'";
$result = mysqli_query($conn,$sql);
// remove all cookies in browser
setcookie('userId',"",time()+5,"/");
setcookie('user_agent',"",time()+5,"/");
setcookie('profile',"",time()+5,"/");                
setcookie('user',"",time()+5,"/");                

header('location:index.php');

?>
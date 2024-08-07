<?php
function ShoppingCart()
{
    include 'connect.php';
    if(isset($_COOKIE['userId']))
    {
        $userid = $_COOKIE['userId'];
        $sql ="SELECT COUNT(*) AS count FROM `cart` WHERE `user_id`=$userid";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $count = $row['count'];
        echo '<a href="cart.php" data-count="'.$count.'" class="block w-fit cursor-default transition-all capitalize px-7 py-3 shadow rounded-md after:content-[attr(data-count)] after:block after:w-6 after:h-6 after:absolute after:text-center relative after:top-0 after:right-0 after:bg-red-500 after:text-white after:rounded-full "><i data-feather="shopping-cart"></i></a>
        ';
    }
    else
    echo '<a href="cart.php"  class="block w-fit cursor-default transition-all capitalize px-7 py-3 shadow rounded-md"><i data-feather="shopping-cart"></i></a>
        ';
}
?>
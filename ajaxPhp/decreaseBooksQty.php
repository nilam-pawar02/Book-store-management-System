<?php
include '../connect.php';

if(isset($_GET['cartId']))
{
$id = $_GET['cartId'];
$actualPrice= $_GET['price'];
        // if your echo something your result may be show unexpected in carts quantity or total price
        // because you echo those two things and set them into the book updated value 
    $sql = "SELECT * FROM cart WHERE cart.id=$id";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        $row= mysqli_fetch_assoc($result);
        $total_price = $row['total_price']-$actualPrice;
        $qty = $row['quantity']-1;
        // echo $total_price; 
        $sql = "UPDATE `cart` SET `quantity`=$qty,`total_price`=$total_price WHERE cart.id=$id";
        $result = mysqli_query($conn,$sql);
        echo $total_price.",".$qty;
    }

//             }
//             else echo "update cart query error";
}
?>
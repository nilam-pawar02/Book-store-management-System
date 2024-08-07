<?php
include '../connect.php';
if(isset($_POST['id']))
{
    $userId = $_COOKIE['userId'];
    $bkid = $_POST['id'];
    // check if the book is already in cart or not
    $sql = "SELECT COUNT(*) AS count FROM `cart` WHERE `book_id`=$bkid AND user_id= $userId";
    $result1 = mysqli_query($conn,$sql);
    if($result1)
    {

        $row1 = mysqli_fetch_array($result1);
        // book is not exists
        $userCartCount = $row1['count'];
         echo $userCartCount;
        if($userCartCount<1)
        {
            
            $sql = "SELECT * FROM `books` WHERE id=$bkid";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $price = $row['price'];
    
            $userId = $_COOKIE['userId'];
            // add into cart 
            $sql = "INSERT INTO `cart` (`user_id`,`book_id`,`quantity`,`total_price`,`discount`) VALUES ($userId,$bkid,1,$price,0)";
            $result = mysqli_query($conn,$sql);
            if($result)
                echo " Added into cart";
            // else echo "query error";
      
         
        }
        // updating the existing book quantity
        else
        {
            $sql = "SELECT * FROM `books` WHERE id=$bkid";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $price = $row['price'];
            $sql = "SELECT * FROM `cart` WHERE `book_id`=$bkid";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                 
                $row = mysqli_fetch_assoc($result);
                $incQty = $row['quantity']+1;
                $incPrice = $row['total_price'] + $price;
                echo $incQty;

                $sql = "UPDATE `cart` SET `quantity`=$incQty,`total_price`=$incPrice WHERE `book_id`=$bkid";
                $result = mysqli_query($conn,$sql);
                echo "update";

            }
            else echo "update cart query error";
          
          }
    }
    else echo "cart query error";


    }else echo 'Access Denied'
?>
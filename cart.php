<?php
include 'components/secondaryNav.php';
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="shortcut icon" href="assets/logo/logo.jpg" type="image/x-icon">
</head>
<body>

    <div class="bg-gray-100 min-h-screen">

        <!-- secondary nav -->
        <?php secondaryNav("cart","bell") ?>
        <!-- ccart items -->
        <div class="cart-container m-4 bg-white sm:bg-transparent rounded-lg shadow p-2 sm:flex items-center flex-wrap gap-2">


            <?php

                if(isset($_COOKIE['userId']))
                {
                    $userId = $_COOKIE['userId'];
                    $sql = "SELECT * from books,cart WHERE books.id = cart.book_id AND cart.user_id=$userId";
                    $result = mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {

                        $image=$row['image'];
                        $title=$row['title'];
                        $totalPrice=$row['total_price'];
                        $qnty=$row['quantity'];
                        $cartProductId= $row['id'];
                        $actualPrice= $row['price'];
                        echo '
                        <div data-id="'.$cartProductId.'" data-price="'.$actualPrice.'" class="card-product mb-4 bg-white rounded-lg p-2">
                        <p class="remove-book text-right">
                            <i data-feather="x" class="inline-block sm:cursor-pointer bg-slate-50 p-2 w-10 h-10 rounded-full hover:scale-90 transition"></i>
                        </p>
                    <div class="flex items-start gap-2">
                        <img class="w-20 h-24 rounded-lg object-cover" src="'.$image.'" alt="">
                        <div class="w-full flex items-center justify-between">
                            <div class="">
                                <h2 class="capitalize line-clamp-1 text-md">'.$title.'</h2>
                                 <p class="text-gray-400 text-sm">160cm</p>
                                <div class="price-ammount font-bold text-md">₹'.$totalPrice.'</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 pr-2">
                                    <div data-action="dec" class="product-minus product-state p-1 border-2 border-black rounded-full">
                                        <i data-feather="minus" class=" w-6 h-6 sm:cursor-pointer"></i>
                                    </div>
                                    <h4 class="product-quantity numbers font-bold text-md">'.$qnty.'</h4>
                                    <div data-action="inc" class="product-plus product-state p-1 bg-black border-2 border-black rounded-full text-white">
                                        <i data-feather="plus" class=" w-6 h-6 sm:cursor-pointer"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                        ';
                    }
                }
            ?>
        
            <!-- product 1 -->
            </div>
         <!-- products end -->

         <div class="sm:grid grid-cols-2 place-items-center bg-transparent">
                <!-- promo code -->
                <div class="flex items-center justify-between bg-white p-2 shadow mx-4 rounded-lg">
                    <input type="text" class="px-4 py-2 bg-transparent placeholder:capitalize w-full capitalize outline-none" placeholder="promo code">
                    <button class="px-6 py-2 capitalize bg-black text-white rounded-lg">apply</button>
                </div>

            <!-- order amonunt -->

            <div class="bg-white p-2 m-4 sm:m-0 rounded-lg shadow sm:w-[90%]">
                <!-- order -->
                <?php
                if(isset($_COOKIE['userId']))
                {
                    $userId = $_COOKIE['userId'];
                    $sql = "SELECT SUM(total_price) AS total_sum FROM cart WHERE user_id=$userId";
                    $result = mysqli_query($conn,$sql);
                    if($result)
                    {
                        $row= mysqli_fetch_assoc($result);
                        $total_sum = $row['total_sum'];
                    }
                }
                ?>
                <div class="flex items-center justify-between border-b-2 border-dashed border-black pb-4 pt-2">
                    <h3 class="text-lg font-semibold capitalize">order amount</h3>
                    <p class="order-ammount font-bold text-lg">₹<?php if(isset($_COOKIE['userId'])) echo $total_sum ?></p>
                </div>
                <!-- tax -->
                <div class="flex items-center justify-between border-b-2 border-dashed border-black pb-4 pt-2">
                    <h3 class="text-lg font-semibold capitalize">tax</h3>
                    <p class="font-bold text-lg">₹18.00</p>
                </div>
                <!-- total payment -->
                <div class="flex items-center justify-between pb-4 pt-2">
                    <h3 class="text-lg font-semibold capitalize">total payment</h3>
                    <p class="total-payment font-bold text-lg">₹<?php if(isset($_COOKIE['userId'])) echo $total_sum+18;?></p>
                </div>

            </div>
        </div>
            <!-- proceed to checkout button -->
            <a href="order.php" class="block m-4 sticky bottom-0 py-2 sm:text-center">
                <button class="capitalize text-white bg-black rounded-lg px-6 py-3 w-full sm:w-[60%]">checkout</button>
            </a href="#">
        </div>
</body>
<script>
    feather.replace();
  </script>
  <script src="scripts/buttonBounce.js"></script>
  <script src="ajaxScripts/increaseProductQuantity.js"></script>
  <script src="ajaxScripts/removeBookfromCart.js"></script>
  <script src="ajaxScripts/updateTotalSum.js"></script>
  <script src="scripts/goBack.js"></script>

</html>
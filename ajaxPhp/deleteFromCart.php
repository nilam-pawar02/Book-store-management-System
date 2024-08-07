<?php
include '../connect.php';
    if(isset($_POST['cartId']))
    {
        $id = $_POST['cartId'];
        $sql = "DELETE FROM cart WHERE cart.id=$id";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x inline-block sm:cursor-pointer bg-slate-50 p-2 w-10 h-10 rounded-full hover:scale-90 transition"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>   
                    </p>
                <div class="flex items-start gap-2">
                    <img class="w-20 h-24 rounded-lg object-cover" src="'.$image.'" alt="">
                    <div class="w-full flex items-center justify-between">
                        <div class="">
                            <h2 class="capitalize line-clamp-1 text-md">'.$title.'</h2>
                             <p class="text-gray-400 text-sm">160cm</p>
                            <div class="price-ammount font-bold text-md">'.$totalPrice.'</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 pr-2">
                                <div data-action="dec" class="product-minus product-state p-1 border-2 border-black rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus w-6 h-6 sm:cursor-pointer"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                                <h4 class="product-quantity numbers font-bold text-md">'.$qnty.'</h4>
                                <div data-action="inc" class="product-plus product-state p-1 bg-black border-2 border-black rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus w-6 h-6 sm:cursor-pointer"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
                    ';
                }
            }
        }
        else
        echo "Delete Query Error";
    }
    
?>
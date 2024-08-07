<?php
 include '../connect.php';
 if(isset($_COOKIE['userId']))
                {
                    $userId = $_COOKIE['userId'];
                    $sql = "SELECT SUM(total_price) AS total_sum FROM cart WHERE user_id=$userId";
                    $result = mysqli_query($conn,$sql);
                    if($result)
                    {
                        $row= mysqli_fetch_assoc($result);
                        $total_sum = $row['total_sum'];
                        $withTax_total_sum = $total_sum+18; 
                        echo $total_sum."WGST".$withTax_total_sum;
                    }
                }
?>
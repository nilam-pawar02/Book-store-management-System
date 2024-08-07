<?php 
include 'connect.php';
include 'isLoggedIn.php';
include 'components/MobileNav.php';
include 'components/DesktopNav.php';
include 'components/ShoppingCart.php';
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
    <!--  -->
    <div class="bg-gray-100 lg:flex">
    <!-- navigations mobile -->
    <?php MobileNav();?> 
    <!-- navigation mobile end -->

    <!-- navigation desktop -->
    <?php DesktopNav(); ?>
    <!-- navigation end Desktop -->
    <!-- book infomation -->
    <!-- main -->
    <div class=" book-info mx-4 lg:h-screen lg:overflow-y-scroll lg:w-full scrollbar-hidden">
       <!-- search bar -->
       <div class="search-container py-4 flex items-center justify-between">
        <form action="search.php" method="get">
            <div id="search-bar" class="hidden lg:flex items-center bg-white w-fit rounded-lg shadow">
            <input name="s" class=" placeholder:capitalize px-4 py-2 bg-transparent outline-none sm:w-96 w-[77vw] capitalize" type="text" placeholder="search book">
                <button type="submit" class="p-3 sm:cursor-pointer cursor-default">
                    <i data-feather="search"></i>
                </button>

            </div>
        </form>
        <div class="hidden md:block">
            <?php ShoppingCart(); ?>
        </div>
    </div>
        

        <div class="flex flex-col p-4 mb-4 shadow bg-white rounded lg:flex-row lg:gap-4">
            <div class="lg:hidden flex items-end justify-between mb-2 ">
                <p></p>
                <p class="share-button capitalize px-7 py-3 shadow shadow-gray-50 rounded-md w-fit hover:bg-gray-50 transition"><i data-feather="share-2"></i></p>
            </div>
            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `books` WHERE id = $id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                
                $bookName = $row['title'];
                $bookImage = $row['image'];
                $desc = $row['description'];
                $lang = $row['language'];
                $genre = $row['genre'];
                $price = $row['price'];
                
                echo '
                <img class="w-52 h-66 rounded self-center" src="'.$bookImage.'" alt="">
                <div class="book-basic">
                    <h2 class="book-title capitalize text-2xl my-1">'.$bookName.'</h2>
                    <p class="price text-3xl underline mb-4 font-bold">₹ '.$price.'</p>
                    <div class="author-info">
                        <div class="flex items-center gap-2">
                            <img class="w-10 h-10 rounded-full object-cover" src="assets/avtar/sample_img.jpg" alt="">
                            <div class="auth-name">
                                <p class="capitalize font-semibold text-lg">j.k.rolling</p>
                                <p class="capitalize">12 publications</p>
                            </div>
                        </div>
                        <div class="ratting-stars flex items-center gap-2 mt-4">
                            <i data-feather="star" class="bg-amber-500 rounded-full"></i>
                            <i data-feather="star" class="bg-amber-500 rounded-full"></i>
                            <i data-feather="star" class="bg-amber-500 rounded-full"></i>
                            <i data-feather="star" class="bg-gradient-to-r from-amber-500 from-50% via-white via-50% rounded-full"></i>
                            <p class="out-of">4.5/5</p>
                        </div>
                    </div>
                    <!-- buy & add to favourite  for desktop-->
                    <div class="hidden mt-4 lg:block ">';

                     
                    if(isset($_COOKIE['userId']))
                    {
                        if(isloggedIn())
                            echo '<div class="buyButton block cursor-default focus:scale-90 transition-all capitalize px-10 py-3 bg-black text-white shadow rounded-md">buy now</div>';
                    }
                    else
                        echo '<a href="auth/signin.php" class="buyButton block cursor-default focus:scale-90 transition-all capitalize px-10 py-3 bg-black text-white shadow rounded-md">buy now</a>';
                    
                       
                    echo' <a href="#" class="block capitalize px-6 py-3 bg-transparent rounded-md flex items-center gap-1 border-2 mb-3 w-60 hover:bg-gray-50"><i data-feather="heart"></i> favourite</a>
                        <div class="flex items-center gap-4">
                            <p class="cursor-pointer capitalize px-7 py-3 shadow rounded-md w-fit hover:bg-gray-50 transition"><i data-feather="share-2"></i></p>
                            <a href="#" class="block capitalize px-7 py-3 shadow rounded-md w-fit hover:bg-gray-50 transition"><i data-feather="shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                </div>
                <!-- book about -->
                <div class="about-book lg:flex items-start gap-4 lg:bg-white lg:rounded lg:shadow">
                    <div class="about-info bg-white rounded p-4 shadow lg:shadow-none">
                        <h3 class="about-title capitalize text-xl md:text-2xl font-semibold">about</h3>
                        <p class="md:text-lg mb-2 lg:max-w-lg">'.$desc.'</p>                        
                        ';
                        // genere div 

                        echo '
                        <div class="">
                        <!-- current book genere -->
                        <h3 class="about-title capitalize text-xl font-semibold mb-2">genere</h3>
    
                        <div class="flex items-center flex-wrap gap-2 justify-center">
                       
                        '; 
                        $arrayGenre = explode(',',$genre);
                        foreach($arrayGenre as $value)
                        {
                            echo '
                            <p class="capitalize border-2 border-gray-200 rounded-md p-2">'.$value.'</p>';
                        }
                        echo '
                            </div>
                        </div>
        
                        <!-- book language and more disciption -->
                        <div class="mt-4">
                            <h3 class="about-title capitalize text-xl font-semibold">book language</h3>
                            <div class="flex items-center gap-2 flex-wrap">
                                <p class="capitalize shadow w-fit px-4 py-2 rounded">'.$lang.'</p>
                               </div>
                            
                        </div>
                    </div>
                ';

                
            }


            ?>
           


            <div class="you-may-also-like my-4 lg:my-0 bg-white rounded-md shadow p-4 lg:shadow-none">
                <!-- realted book filter by genere -->
                <h3 class="capitalize text-xl font-semibold">you may also like</h3>
                <div class="flex flex-wrap items-center justify-center gap-4 mt-4 lg:justify-start">
                    <?php
                        $arrayGenre;
                        $sql = "SELECT * FROM `books` WHERE genre= '$arrayGenre[0]' ORDER BY `books`.`id` DESC LIMIT 10";
                        $result = mysqli_query($conn,$sql);
                        if($result)
                        {
                          while($row = mysqli_fetch_assoc($result))
                            {
                                $bookName = $row['title'];
                                $bkId = $row['id'];
                                $bookImage = $row['image'];
                                $price = $row['price'];
    
                                echo '
                                <a href="buyPage.php?id='.$bkId.'&name='.$bookName.'" class="w-32 cursor-default sm:cursor-pointer">
                                <img class="h-18 rounded" src="'.$bookImage.'" alt="">
                                <h3 class="line-clamp-2">'.$bookName.'</h3>
                                <p class="font-semibold text-green-500">₹'.$price.'</p>
                            </a>
                                ';

                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- for mobile -->
    <div class="flex items-center justify-center gap-2 py-3 mt-4 sticky bottom-0 bg-white lg:hidden">
        <?php ShoppingCart(); ?>
        <a href="#" class="block cursor-default focus:scale-90 hover:border-black transition-all capitalize px-5 py-2 bg-transparent rounded-md flex items-center border-2"><i class="mr-1" data-feather="heart"></i> favourite</a>
        <?php 
        if(isset($_COOKIE['userId']))
        {
            if(isloggedIn())
                echo '<div class="buyButton block cursor-default focus:scale-90 transition-all capitalize px-10 py-3 bg-black text-white shadow rounded-md">buy</div>';
        }
        else
            echo '<a href="auth/signin.php" class="buyButton block cursor-default focus:scale-90 transition-all capitalize px-10 py-3 bg-black text-white shadow rounded-md">buy</a>';
        ?>
    </div>
    </div>
</body>
<script>
    feather.replace();
  </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js" integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js" integrity="sha512-LQQDtPAueBcmGXKdOBcMkrhrtqM7xR2bVrnMtYZ8ImAZhFlIb5xrMqQ6uZviyeSB+4mYj89ta8niiCIQM1Gj0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="scripts/hammer.js"></script>
   <script src="scripts/searchToggle.js"></script>
   <script src="scripts/stickyNav.js"></script>
   <script src="scripts/shareButton.js"></script>
   <script src="scripts/checkUserStatus.js"></script>
   <script src="ajaxScripts/addBookIntoCart.js"></script>
</html>
<?php 
include 'connect.php';
include 'components/MobileNav.php';
include 'components/DesktopNav.php';
include 'isLoggedIn.php';
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
    <!--Aside mobile-->
        <?php MobileNav();?> 
    <!--end aside mobile -->
    <!-- main section divder -->
    <div class="wrapper-aside-main lg:flex items-start">
        <!-- start desktop aside -->
        <?php DesktopNav(); ?>
        <!--  end desktop aside  -->
<!-- main -->
<!-- in mobile main container height is decrease because of the asideSlider bug -->
<div class="main-content bg-gray-100 px-4 py-4 md:shrink w-full lg:h-screen overflow-y-scroll">
    
    <!-- search Bar -->
    <div class="search-container py-4 flex items-center justify-between">
        <form action="search.php" method="get">
        <div id="search-bar" class="hidden lg:flex items-center bg-white w-fit rounded-lg shadow">
            <input name="s" class=" placeholder:capitalize px-4 py-2 bg-transparent outline-none sm:w-96 w-[77vw] capitalize" type="text" placeholder="search book">
                <button type="submit" class="p-3 sm:cursor-pointer cursor-default">
                    <i data-feather="search"></i>
                </button>

            </div>
        </form>   
        <!-- cart and account -->
        <div class="cart_and_account flex items-center gap-4">
            <a href="cart.php" class="hidden lg:block cursor-pointer capitalize px-7 py-3 shadow rounded-md w-fit hover:bg-gray-50 transition">
                <i data-feather="shopping-cart"></i>
            </a>
            
<!-- account info -->
<div class=" xl:block">
    <!-- account for desktop users -->
    <div class="hidden xl:flex items-center gap-4 py-4 px-1">
        <i data-feather="bell"></i>
        <?php 
        if(isset($_COOKIE['userId']))
        if(isloggedIn())  
        echo '<div class="desktop-profile flex items-center gap-1 cursor-pointer">
        <img class="w-10 h-10 rounded-full" src="'.$_COOKIE['profile'].'" alt="">
        <span class="user font-semibold capitalize">'.$_COOKIE['user'].'</span>
        <i data-feather="chevron-down"></i>
    </div>';
        ?>
        
    </div>
    <!-- if user click on their account then show them this -->
    <div class="user-profile z-20 hidden desktop-account-info bg-white shadow shadow-gray-400 py-3 rounded absolute w-[270px] right-0">
        <div class="flex items-center gap-8 px-3">
            <i class="desktop-cross cursor-pointer p-2 rounded-full bg-slate-100 w-8 h-8" data-feather="x"></i>
            <div class="wesite-name uppercase">book store</div>
        </div>
        <div class="mt-4">
            <?php
                if(isloggedIn())
                {
                    $id = $_COOKIE['userId'];
                    $userName = $_COOKIE['user'];
                    echo '
                    <a href="auth/user_profile.php?id='.$id.'&name='.$userName.'" class="block capitalize hover:bg-slate-50 px-4 py-3 rounded flex items-center justify-between">
                    <span>visit your profile</span> 
                    <i data-feather="chevron-right"></i>
                </a>
                <a href="#" class="block capitalize hover:bg-slate-50 px-4 py-3 rounded mt-4 flex items-center justify-between">
                    <span>log out</span> 
                    <i data-feather="log-out"></i>
                </a>
                    ';
                }
                
            ?>
        </div>
    </div>

</div>
        </div>
        
    </div>
    
    <!-- black sky -->
    <div class="showcase relative h-40 sm:h-60">
        <img class="absolute w-full rounded-lg h-full" src="assets/blackSky.jpg" alt="">
       <div class="flex flex-col items-start justify-center h-full px-4">
           <h2 class="relative text-xl uppercase text-white font-semibold">the stroy of black sky</h2>
           <button class="relative cursor-default sm:cursor-pointer bg-white font-semibold text-sm text-black capitalize px-6 py-2 mt-3 rounded-lg">see now</button>
       </div>
    </div>

      <!-- classic section -->
      <div class="classic-slider my-4">
        <div class="flex justify-between sm:px-4 mb-4">
        <h2 class="text-lg font-semibold uppercase">classic</h2>
        <a href="#see-all" class="cursor-default sm:cursor-pointer capitalize px-6 py-1 bg-white hover:bg-neutral-100 transition rounded-md">see all</a>
        </div>
        <div class="flex relative overflow-hidden xl:overflow-x-scroll">
            <div class="absolute top-0 left-0 w-10 h-full shadow rounded grid place-items-center lg:hidden z-10">
                <img class="arrow-left bg-black rounded-full" src="assets/icons/arrow-left-s-line.svg" alt="">
            </div>
            <div class="slider-imges flex flex-nowrap gap-4 pl-14 scrollbar-hidden transition-all">
                <?php
                     $sql = "SELECT * FROM `books`  ORDER BY `books`.`id` DESC LIMIT 10";
                     $result = mysqli_query($conn,$sql);
                     if($result)
                     {
                       while($row = mysqli_fetch_assoc($result))
                         {
                             $bookName = $row['title'];
                             $bkId = $row['id'];
                             $bookImage = $row['image'];
 
                             echo '
                             <a href="buyPage.php?id='.$bkId.'&name='.$bookName.'" class="cursor-default sm:cursor-pointer flex-shrink-0">
                                 <img class="w-48 h-60 shrink-0 object-cover" src="'.$bookImage.'" alt="">
                            </a>
                             ';

                         }
                     }
                ?>

            </div>
            <div class="absolute top-0 right-0 w-10 h-full shadow rounded grid place-items-center lg:hidden">
                <img class="arrow-right bg-black rounded-full" src="assets/icons/arrow-right-s-line.svg" alt="">
            </div>
        </div>
    </div>
    <!-- traindig books -->
    <div class="my-4 overflow-hidden">
        <h2 class="text-lg uppercase font-semibold">our collection</h2>
        <div class="filters flex items-center gap-2 overflow-x-scroll my-2 scrollbar-hidden py-2 md:flex-wrap">
            <button class="cursor-default sm:cursor-pointer capitalize bg-black px-6 py-2 rounded-full font-semibold text-white whitespace-nowrap">all</button>
            <button class="cursor-default sm:cursor-pointer capitalize bg-gray-400 hover:bg-gray-500 px-5 py-2 rounded-full font-semibold text-white whitespace-nowrap">fiction</button>
            <button class="cursor-default sm:cursor-pointer capitalize bg-gray-400 hover:bg-gray-500 px-5 py-2 rounded-full font-semibold text-white whitespace-nowrap">non fiction</button>
            <button class="cursor-default sm:cursor-pointer capitalize bg-gray-400 hover:bg-gray-500 px-5 py-2 rounded-full font-semibold text-white whitespace-nowrap">textbooks</button>
            <button class="cursor-default sm:cursor-pointer capitalize bg-gray-400 hover:bg-gray-500 px-5 py-2 rounded-full font-semibold text-white whitespace-nowrap">poetry</button>
            <button class="cursor-default sm:cursor-pointer capitalize bg-gray-400 hover:bg-gray-500 px-5 py-2 rounded-full font-semibold text-white whitespace-nowrap">historical</button>
            <button class="cursor-default sm:cursor-pointer flex items-center capitalize border-2 border-black hover:bg-white px-4 py-1 pr-9 rounded-full font-semibold text-black whitespace-nowrap">
                <img class="w-4" src="assets/icons/filter.svg" alt="">
                <span>filter</span>
            </button>
        </div>
    </div>

    <!-- books -->
    <div class="books-section custom-grid">
        <!--design 1  -->
        <?php
            $sql = "SELECT * FROM `books` ORDER BY `books`.`id` DESC";
            
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $bookImage = $row['image'];
                    $authorId = $row['author_id'];
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    
                    echo '       
                     <a href="buyPage.php?id='.$id.'&name='.$title.'" class="book cursor-default sm:cursor-pointer bg-slate-400 rounded-md">
                    <img class="w-full h-60 object-contain px-2 py-4 hover:object-cover transition-all ease-linear hover:p-0 hover:rounded-t" src="'.$bookImage.'" alt="">
                    <div class="px-6 py-2 bg-white rounded-b-md">
                        <div class="flex items-center justify-between">
                        <p class="auth-name flex items-center gap-1">
                            <span class="capitalize text-sm">admin</span> 
                            <img class="isverfied w-4" src="assets/icons/verified.svg" alt="">
                        </p>
                        <img class="auth-profile w-10 rounded-full object-cover translate-y-[-20px]" src="assets/avtar/sample_img.jpg" alt="">
                        </div>
                        <p class="book-name py-1 capitalize line-clamp-2 text-lg">'.$title.'</p>
                        <div class=""><span class="font-bold text-green-500 text-2xl">₹'.$price.'</span></div>
                    </div>
                </a>';
                }
            }
            else
                
        ?>

        <!-- design 2 -->       
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
  <script src="scripts/leftRightArrowTranslate.js"></script>
  <script src="scripts/showDesktopUserProfile.js"></script>
</html>
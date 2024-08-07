<?php 
    include '../connect.php';
    include 'DashComponents/DMobileNav.php';
    include 'DashComponents/DashDesktopNav.php';
    include '../components/SearchBar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>

    
    <div class="logo flex items-center justify-center py-3 lg:hidden">
        <img class="w-14 h-14 rounded-md" src="../assets/logo/logo.jpg" alt="">
        <p class="capitalize text-xl italic ml-1 font-bold">book store</p>
    </div>

    <!-- mobile nav -->
   
    <?php DMobileNav();?>
    <!-- mobile nav end -->

<!-- main section divder wrapper -->
<!-- main of aside and main -->
<div class="wrapper-aside-main lg:flex items-start bg-gray-100">
    <!-- desk nav -->
        <?php DashDesktopNav();?>
    <!-- desk nav end -->

<!-- main content -->
<main class="p-4 w-full">
    <?php SearchBar();?>
    <div class="sm:flex items-center justify-between">

        <div class="welcome my-4">
            <h3 class="text-xl font-bold capitalize">hello,shubh</h3>
            <p class="text-lg text-gray-400 capitalize">today is monday,18 december 2023</p>
        </div>
        <button class="dash-items flex items-center gap-1 text-md font-semibold capitalize bg-black text-white py-2 px-7 rounded-lg">
            <i data-feather="book"></i>
            <span>add new book</span>
        </button>
    </div>

    <!-- stats -->
    <div class="show-dash-result">

   <?php
   $sql = "SELECT COUNT(*) AS userCount FROM users";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $userCount = $row['userCount'];
    }
   $sql = "SELECT COUNT(*) AS bookCount FROM books";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $bookCount = $row['bookCount'];
    }
   ?>
    <div class="sm:bg-white sm:m-4 sm:px-4 py-6 rounded-lg grid grid-cols-2 md:grid-cols-3 gap-3">

        <div class="card bg-white px-4 py-6 rounded-lg sm:rounded-none sm:border-r-2 border-gray-300">
            <h3 class="capitalize text-lg flex items-center sm:justify-center gap-1">
                <i class="text-pink-500" data-feather="book-open"></i>
                <span> books</span>
                </h3>
            <div class="flex items-center justify-center mt-1">
                <p class="text-xl font-semibold"><?php echo $bookCount?>+</p>
                <p class="today-added text-lg rounded-full bg-green-200 px-1 text-green-700"><i class="inline-block" data-feather="arrow-up-right"></i></p>
            </div>
        </div>
        
        <div class="card bg-white px-4 py-6 rounded-lg sm:rounded-none sm:border-r-2 border-gray-300">
            <h3 class="capitalize text-lg flex items-center sm:justify-center gap-1">
                <i class="text-violet-600" data-feather="users"></i>
                <span>users</span>
            </h3>
            <div class="flex items-center justify-center mt-1">
                <p class="text-xl font-semibold"><?php echo $userCount?>+</p>
                <p class="today-added text-lg rounded-full bg-green-200 px-1 text-green-700"><i class="inline-block" data-feather="arrow-up-right"></i></p>
            </div>
        </div>
        <div class="card bg-white px-4 py-6 rounded-lg sm:rounded-none sm:border-r-2 border-gray-300">
            <h3 class="capitalize text-lg flex items-center sm:justify-center gap-1">
                <i class="text-red-500" data-feather="flag"></i>
                <span>reports</span>
            </h3>
            <div class="flex items-center justify-center mt-1">
                <p class="text-xl font-semibold">0+</p>
                <!-- <p class="today-added text-lg rounded-full bg-green-200 px-1 text-green-700">2+ <i class="inline-block" data-feather="arrow-up-right"></i></p> -->
            </div>
        </div>

    </div>

    <!-- monthly revenue -->
    <div class="sm:m-4 p-4 bg-white rounded-lg">
        <h3 class="text-lg capitalize font-semibold">monthly revenue</h3>
        <p class="text-2xl font-bold">₹15,000</p>

        <!-- monthwise bars -->
        <!-- max-height of bar is h-24 -->
    <div class="my-6 flex flex-wrap items-center gap-5 sm:gap-4">
           <!-- to show price month use mouse enter and leave event on the bar -->
           <!-- and mobile use touchstart event -->
 <div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">jan</p>
</div>
 <div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">feb</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">mar</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">apr</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">may</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">jun</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">jul</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">aug</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">sep</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">oct</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">nov</p>
</div>
<div class="bar flex flex-col items-center justify-end h-32 relative">
    <p class="hidden price-month absolute bottom-full">₹50</p>
    <div class="w-8 h-24 bg-gray-300 rounded hover:bg-blue-600"></div>
    <p class="month capitalize text-gray-400">dec</p>
</div>
            
           

        </div>
    </div>

    </div>
</main>
</div>
</body>
<script>
    feather.replace();
  </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js" integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js" integrity="sha512-LQQDtPAueBcmGXKdOBcMkrhrtqM7xR2bVrnMtYZ8ImAZhFlIb5xrMqQ6uZviyeSB+4mYj89ta8niiCIQM1Gj0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../scripts/hammer.js"></script>
  <script src="../scripts/searchToggle.js"></script>
  <script src="authAjaxScripts/dashboard.js"></script>
</html>
<?php
    include '../isLoggedIn.php';
    function DashDesktopNav()
    {
        echo '
        <div class="hidden lg:block py-4 px-8 bg-white">
        <div class="desk-logo">
            <img class="logo-size rounded-full w-20 h-20" src="../assets/avtar/sample_img.jpg" alt="">
            <h3 class="text-xl capitalize font-semibold mt-2">shubh</h3>
            <p class="text-gray-400 text-lg">@shubh8268</p>
        </div>
    
        <div class="desk-aside-container  flex flex-col items-start justify-between ">
        <div class="aside mt-8">
            <!-- write a javascript for if bg-black contains class then remove hover of that element -->
            <a href="#" class="dash-items flex items-center gap-4 text-white bg-black rounded-lg py-2 px-4">
                <i data-feather="home"></i>
                <p class="capitalize">dashboard</p>
            </a>
            <a href="#" class="dash-items flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
                <i data-feather="book-open"></i>
                <p class="capitalize">uploaded books</p>
            </a>
            <a href="#" class="dash-items flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
                <i data-feather="users"></i>
                <p class="capitalize">new Users</p>
            </a>
            <a href="#" class="dash-items flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
                <i data-feather="bell"></i>
                <p class="capitalize">notifications</p>
            </a>
            <a href="#" class="dash-items flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
                <i data-feather="flag"></i>
                <p class="capitalize">reports</p>
            </a>
        </div>';
        if(isset($_COOKIE['user']) && isset($_COOKIE['user_agent']))
        {
            // if islogged in return true
            if(isloggedIn())
           echo '
            <!-- logout -->
            <!-- if user not signed in then replace this logout to sign in using php session -->
            <div class="cursor-pointer flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
                <i data-feather="log-out"></i>
                <p class="capitalize">log out</p>
            </div>';
        }
        else
        echo '
        <div class="cursor-pointer flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
        <i data-feather="user"></i>
        <p class="capitalize">log in</p>
    </div>';
        echo '
        </div>    
        </div>
    
             ';
    }

?>
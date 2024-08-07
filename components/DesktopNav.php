<?php
    function DesktopNav()
    {
        echo '
        <div class="hidden lg:block py-4 px-6 bg-white">
        <div class="logo">
            <img class="logo-size rounded-md" src="assets/logo/logo.jpg" alt="">
        </div>
        <!-- desktop aside -->
        <div class="aside-container flex flex-col items-start justify-between ">
        <div class="aside mt-8">
            <!-- write a javascript for if bg-black contains class then remove hover of that element -->
            <a href="index.php" class="flex items-center gap-4 text-white bg-black rounded-lg py-3 px-8">
                <i data-feather="home"></i>
                <p class="capitalize">home</p>
            </a>
            <a href="#" class="flex items-center gap-4 rounded-lg py-3 px-8 mt-5 hover:bg-slate-50">
                <i data-feather="heart"></i>
                <p class="capitalize">favourite</p>
            </a>
            <a href="#" class="flex items-center gap-4 rounded-lg py-3 px-8 mt-5 hover:bg-slate-50">
                <i data-feather="bookmark"></i>
                <p class="capitalize">collection</p>
            </a>
            <a href="#" class="flex items-center gap-4 rounded-lg py-3 px-8 mt-5 hover:bg-slate-50">
                <i data-feather="shopping-bag"></i>
                <p class="capitalize">orders</p>
            </a>
            <a href="#" class="flex items-center gap-4 rounded-lg py-3 px-8 mt-5 hover:bg-slate-50">
                <i data-feather="settings"></i>
                <p class="capitalize">settings</p>
            </a>
        </div>';
        if(isset($_COOKIE['user']) && isset($_COOKIE['user_agent']))
        {
            // if islogged in return true
            if(isloggedIn())  
            echo '
            <!-- logout -->
            <!-- if user not signed in then replace this logout to sign in using php session -->
            <a href="logout.php" class="userStatus login cursor-pointer flex items-center gap-4 rounded-lg py-3 px-8 mt-5 hover:bg-slate-50">
                <i data-feather="log-out"></i>
                <p class="capitalize">log out</p>
            </a>';
        }
        else
        echo '
        <a href="auth/signin.php" class="userStatus logoff cursor-pointer flex items-center gap-4 rounded-lg py-2 px-4 mt-5 hover:bg-slate-50">
        <i data-feather="user"></i>
        <p class="capitalize">log in</p>
    </a>
        ';
        echo '
    </div>

    </div>
             ';
    }
?>
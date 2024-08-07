<?php
    function MobileNav()
    {
        include 'connect.php';
        echo '
        <div class="lg:hidden flex justify-between sticky top-0 px-5 py-3 bg-white z-10">
        <i id="hammer" class="hover:bg-gray-100 text-xl w-12 h-12 rounded-md p-2" data-feather="menu"></i>
        <img class="w-16 h-12 rounded-lg" src="assets/logo/logo.jpg" alt="">
    <i id="search-tg" class="hover:bg-gray-100 text-xl w-12 h-12 rounded-full p-2" data-feather="search"></i>    
    </div>
    <!-- mobile slider -->
    <!--check click on menu if slider not contains hidden class then body.classlist.add overflow-hidden -->
    <div id="aside-slider" class="hidden fixed top-0 z-20 w-full transition-all">
    <div class="lg:hidden flex items-start justify-between px-2 gap-3 bg-white">
        <div class="desktop-aside w-60 h-[calc(100dvh)] flex flex-col items-start justify-between">
            <div class="aside mt-8 w-full">
                <!-- write a javascript for if bg-black contains class then remove hover of that element -->
                <a href="index.php" class="block cursor-default flex items-center gap-4 text-white bg-black rounded-lg py-3 px-4">
                    <i data-feather="home"></i>
                    <p class="capitalize">home</p>
                </a>
                <a href="#" class="cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mt-4 hover:bg-slate-100">
                    <i data-feather="heart"></i>
                    <p class="capitalize">favourite</p>
                </a>
                <a href="all_authors.php" class="cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mt-4 hover:bg-slate-100">
                    <i data-feather="users"></i>
                    <p class="capitalize">authors</p>
                </a>
                <a href="#" class="cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mt-4 hover:bg-slate-100">
                    <i data-feather="shopping-bag"></i>
                    <p class="capitalize">orders</p>
                </a>
                <a href="#" class="cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mt-4 hover:bg-slate-100">
                    <i data-feather="settings"></i>
                    <p class="capitalize">settings</p>
                </a>
            </div>
            <!-- logout and account -->
            <div class="pf-lg w-full">
            ';
        if(isset($_COOKIE['user']) && isset($_COOKIE['user_agent']))
        {
            // if islogged in return true
            if(isloggedIn())
                $uName = $_COOKIE['user'];
            echo '
                <!-- if user not signed in then replace this logout to sign in using php cookie -->
                <a href="auth/user_profile.html" class="userStatus login cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mb-1 w-full hover:bg-slate-100">
                    <i data-feather="user"></i>
                    <p class="capitalize line-clamp-1">'.$uName.'</p>
                </a>
                <a class="cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mb-4 w-full hover:bg-slate-100">
                    <i data-feather="log-out"></i>
                    <p class="capitalize">log out</p>
                </a>
            ';
        }
        else
        echo '
        <a href="auth/signin.php" class="userStatus logoff cursor-default flex items-center gap-4 rounded-lg py-3 px-4 mb-4 w-full hover:bg-slate-100">
            <i data-feather="user"></i>
            <p class="capitalize line-clamp-1">log in</p>
        </a>
        ';
           
        echo '
        </div>
        </div>
        <div class="cross-aside p-2 mt-6 bg-gray-100 rounded-full">
            <i id="close-aside" class="w-8 h-8" data-feather="x"></i>
        </div>
    </div>
</div>
             ';
    }
?>
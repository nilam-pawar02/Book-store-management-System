<?php
    function resetDashboard()
    {
        include '../../connect.php';
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
        
        echo '
            
    <div class="sm:bg-white sm:m-4 sm:px-4 py-6 rounded-lg grid grid-cols-2 md:grid-cols-3 gap-3">

    <div class="card bg-white px-4 py-6 rounded-lg sm:rounded-none sm:border-r-2 border-gray-300">
        <h3 class="capitalize text-lg flex items-center sm:justify-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open text-pink-500"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
         <span> books</span>
            </h3>
        <div class="flex items-center justify-center mt-1">
            <p class="text-xl font-semibold">'.$bookCount.'+</p>
            <p class="today-added text-lg rounded-full bg-green-200 px-1 text-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right inline-block"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            </p>
        </div>
    </div>
    
    <div class="card bg-white px-4 py-6 rounded-lg sm:rounded-none sm:border-r-2 border-gray-300">
        <h3 class="capitalize text-lg flex items-center sm:justify-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-violet-600"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        <span>users</span>
        </h3>
        <div class="flex items-center justify-center mt-1">
            <p class="text-xl font-semibold">'.$userCount.'</p>
            <p class="today-added text-lg rounded-full bg-green-200 px-1 text-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right inline-block"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
            </p>
        </div>
    </div>
    <div class="card bg-white px-4 py-6 rounded-lg sm:rounded-none sm:border-r-2 border-gray-300">
        <h3 class="capitalize text-lg flex items-center sm:justify-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag text-red-500"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
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
<script>
    feather.replace();
  </script>
        ';
    }
?>
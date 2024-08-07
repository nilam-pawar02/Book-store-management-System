<?php include 'components/secondaryNav.php'; ?>
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

    <div class="bg-gray-100">
        <!-- make this as function that get parameter heading  -->
        <?php secondaryNav("authors","bell"); ?>
          <!-- search bar for auth -->
          <div class="flex items-center m-4 bg-white rounded-lg">
            <input class="w-full px-4 py-2 outline-none capitalize" type="text" placeholder="search author">
            <div class="p-3 sm:cursor-pointer cursor-default">
                <i data-feather="search"></i>
            </div>
            </div>

            <!-- authors -->
            <div class="custom-grid">
                
                <div class="bg-white m-4 p-4 rounded-lg">
                    <!-- img & 3 dots -->
                    <div class="flex justify-between items-start relative">
                        <p></p>
                        <div class="relative p-2">
                            <img class="w-14 h-14 rounded-full" src="assets/avtar/sample_img.jpg" alt="">
                            <img class="w-6 h-6 absolute bottom-0 right-0 object-cover bg-transparent rounded-full" src="assets/icons/blueTick.jpeg" alt="">
                        </div>
                        <div class="border-transparent cursor-default sm:cursor-pointer">
                            <i class="font-bold text-3xl w-fit">.</i>
                            <i class="font-bold text-3xl w-fit">.</i>
                            <i class="font-bold text-3xl w-fit">.</i>
                        </div>
                        <!-- when click 3 dots toggle this option bar -->
                        <div class="optionBar hidden absolute right-0 top-10 w-40 shadow shadow-gray-300 bg-white rounded">
                            <button class="capitalize text-red-500 p-2 hover:bg-gray-100 rounded w-full">report</button>
                            <button class="capitalize  p-2 hover:bg-gray-100 rounded w-full">other</button>
                        </div>
                    </div>
                    <!-- author info -->
                    <div class="grid place-items-center my-4">
                        <h3 class="capitalize text-lg font-semibold">omkar kumbhar</h3>
                        <p class="userName text-gray-500">@omkarkumbhar22</p>
                        <p class="bio line-clamp-3 text-center">"Find out who you are and do it on purpose." </p>
                        <p class="border border-gray-300 my-4 w-20"></p>
                        <a href="#" class="text-center border-b border-black">
                            <h3 class="text-lg font-semibold">10</h3>
                            <p class="text-gray-400 hover:text-sky-500">books</p>
                        </a>
                    </div>
                </div>

            </div>
            <!-- breakpoint -->
    </div>
</body>
<script>
    feather.replace();
  </script>
</html>
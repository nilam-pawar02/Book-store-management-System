<?php
include 'authentication.php';
include '../isLoggedIn.php';
    if(isset($_COOKIE['userId']))
    if(isloggedIn())
    header('location:../index.php');
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
    <!-- if user is in sign up page then remove h-screen class -->
    <div class="background-bg bg-gray-100 h-screen grid place-items-center bg-[url('../assets/auth/bookbg.jpg')] bg-cover bg-center bg-no-repeat">

        <div class="">
            <!-- sign in -->

            <form class="flip-forms signIn custom-bg-white p-4 m-4 rounded-lg max-w-screen w-80 sm:w-96" method="post">
                <div class="flex items-center justify-between">
                    <img class="w-16 h-14 rounded" src="../assets/logo/logo.jpg" alt="">
                    <a href="#signup" class="flipper cursor-default sm:cursor-pointer">
                        <p class="capitalize text-blue-600 font-semibold">no account ?</p>
                        <p class="capitalize text-blue-600 font-semibold text-right">sign up</p>
                    </a>
                </div>
    
                <h2 class="text-5xl font-bold my-4">Sign in</h2>
                <!-- sign in methods -->
                <div class="">
                    <div class="flex items-center gap-4 justify-center rounded-lg bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 cursor-default sm:cursor-pointer">
                        <i data-feather="smile"></i>
                        <p class="font-semibold capitalize text-lg"> sign in with google</p>
                    </div>
                </div>
    
                <div class="grid">
                    <div class="my-4">
                        <p class="text-gray-500 capitalize">username or email address</p>
                        <input class="login-inp shadow px-4 py-3 w-full rounded-lg mt-1 border hover:border-black focus:border-black" type="text" placeholder="eg - @omkarkumbhar22" name="email">
                    </div>
                    <div class="">
                        <div class="flex items-center justify-between">
                            <p class="text-gray-500 capitalize">password</p>
                            <a href="#" class="text-blue-600 capitalize">forgot password?</a>
                        </div>
                        <div class="bg-white shadow rounded-lg px-4 mt-1 border hover:border-black focus:border-black flex items-center">
                            <input class="login-inp py-3 w-full rounded-lg outline-none" type="password" placeholder="Shubh@345#" name="pwd">
                            <i class="show-pwd" data-feather="eye"></i>
                        </div>
                        <p class="text-red-500 capitalize login-warn hidden">username and password cannot be empty</p>
                    </div>
                    <button type="submit" name="login" class="login-button bg-black text-white w-fit py-2 px-8 rounded-md my-5 mt-8 cursor-default sm:cursor-pointer hover:bg-zinc-800">Sign in</button>
                </div>
            </form>

            <!-- sign up -->

            <form class="hidden flip-forms signup custom-bg-white p-4 m-4 rounded-lg max-w-screen w-80 sm:w-96" method="post" enctype="multipart/form-data">
                <div class="flex items-center justify-between">
                    <img class="w-16 h-14 rounded" src="../assets/logo/logo.jpg" alt="">
                    <a href="#signin" class="flipper cursor-default sm:cursor-pointer">
                        <p class="text-blue-600 font-semibold">Already have an</p>
                        <p class="text-blue-600 font-semibold text-right">account ?</p>
                    </a>
                </div>
    
                <h2 class="text-5xl font-bold my-4">Sign up</h2>
                <!-- sign in methods -->
                <div class="">
                    <div class="flex items-center gap-4 justify-center rounded-lg bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 cursor-default sm:cursor-pointer">
                        <i data-feather="smile"></i>
                        <p class="font-semibold capitalize text-lg"> sign up with google</p>
                    </div>
                </div>
    
                <div class="all-inputs grid">
                    <div class="upload-profile my-4 px-2 py-5 bg-white rounded-xl flex items-center gap-2 justify-center cursor-default sm:cursor-pointer hover:bg-black hover:text-white transition">
                        <i data-feather="upload-cloud" class="text-blue-600 w-8 h-8"></i>
                        <h3 class="text-lg capitalize font-semibold">upload profile pic</h3>
                    </div>
                    <div class="mt-3 mb-2">
                        <p class="text-gray-500 capitalize">full name</p>
                        <input class="shadow px-4 py-3 w-full rounded-lg mt-1 border hover:border-black focus:border-black capitalize" type="text" placeholder="hi shubh" name="f-name">
                    </div>
                    <div class="my-2">
                        <p class="text-gray-500 capitalize">email address</p>
                        <input class="shadow px-4 py-3 w-full rounded-lg mt-1 border hover:border-black focus:border-black" type="email" placeholder="shubh@gmail.com" name="email">
                    </div>
                    <div class="my-2">
                        <p class="text-gray-500 capitalize">Date of birth</p>
                        <input class="shadow px-4 py-3 w-full rounded-lg mt-1 border hover:border-black focus:border-black capitalize" type="date" name="dob">
                        <p class="text-gray-500">DOB is help to forgot your password</p>
                    </div>
                    <!-- <div class="my-2">
                        <p class="text-gray-500 capitalize">username</p>
                        <input class="shadow px-4 py-3 w-full rounded-lg mt-1 border hover:border-black focus:border-black capitalize" type="text" placeholder="Shubh22" name="username">
                    </div> -->
                    <div class="my-2">
                        <p class="text-gray-500 capitalize">password</p>
                        <div class="bg-white shadow rounded-lg px-4 mt-1 border hover:border-black focus:border-black flex items-center">
                            <input class="c-pwd py-3 w-full rounded-lg outline-none" type="password" placeholder="Shubh@345#" name="pwd">
                            <i class="show-pwd cursor-default sm:cursor-pointer" data-feather="eye"></i>
                        </div>
                    </div>
                    <div class="my-2">
                        <p class="text-gray-500 capitalize">confirm password</p>
                        <div class="bg-white shadow rounded-lg px-4 mt-1 border hover:border-black focus:border-black flex items-center">
                            <input class="c-pwd py-3 w-full rounded-lg outline-none" type="password" placeholder="Shubh@345#" name="c-pwd">
                            <i class="show-pwd cursor-default sm:cursor-pointer" data-feather="eye"></i>
                        </div>
                        <p class="pwd-query text-red-500"></p>
                    </div>
                    <button type="submit" name="register" class="registration-button bg-black text-white w-fit py-2 px-8 rounded-md my-5 mt-8 cursor-default sm:cursor-pointer hover:bg-zinc-800">Sign up</button>
                </div>
            </form>
        </div>
       
    </div>

</body>
<script>
    feather.replace();
  </script>
  <script src="authScripts/flipform.js"></script>
  <script src="authScripts/checkFormState.js"></script>
  <script src="authScripts/uploadProfile.js"></script>
  <script src="../scripts/showpassword.js"></script>
  <script src="../scripts/loginValidation.js"></script>
  <script src="../scripts/passwordValidation.js"></script>
  <script src="../scripts/hideWarnings.js"></script>
  </html>

<?php
include 'connect.php';
include 'components/secondaryNav.php';
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
<div class="bg-gray-100 min-h-screen">

    <?php secondaryNav('Search','search')?>
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
    </div>
    <div class="result-for flex items-center gap-2 p-2">
    <p class="capitalize">search result for:</p>
        <h2 class="result-for capitalize font-bold"><?php if(isset($_GET['s'])) echo $_GET['s']; ?></h2>
    </div>
    <div class="all-searches grid xl:grid-cols-4 grid-cols-1 gap-4 px-4">
        <?php
           if(isset($_GET['s']))
           {
               $search = $_GET['s'];
               $sql = "SELECT * from books WHERE LOWER(books.title) like LOWER('%$search%')";
               $result = mysqli_query($conn,$sql);
               while($row=mysqli_fetch_assoc($result))
               {
                $bookImage = $row['image'];
                $authorId = $row['author_id'];
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                
                echo '       
                 <a href="buyPage.php?id='.$id.'&name='.$title.'" class="book cursor-default sm:cursor-pointer bg-slate-400 rounded-md overflow-hidden">
                <img class="w-full h-60 object-cover hover:scale-105 transition-all ease-linear hover:rounded-t" src="'.$bookImage.'" alt="">
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
        ?>
    </div>
</div>
</body>
<script>
    feather.replace();
  </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js" integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js" integrity="sha512-LQQDtPAueBcmGXKdOBcMkrhrtqM7xR2bVrnMtYZ8ImAZhFlIb5xrMqQ6uZviyeSB+4mYj89ta8niiCIQM1Gj0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="scripts/searchToggle.js"></script>
  <script src="scripts/goBack.js"></script>

</html>
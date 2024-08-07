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
    <div class="bg-gray-100 h-screen">
        
    <?php secondaryNav("order sucess","bell") ?>
          <!--  -->
          <div class="grid place-items-center my-4">
            <h2 class="capitalize text-2xl font-semibold">great thanks</h2>
            <img src="assets/icons/order-confirmation.png" alt="">
            <a href="index.html">
              <button class="capitalize px-6 py-2 rounded text-white bg-slate-800">go home</button>
            </a>
          </div>
    </div>
</body>
<script>
    feather.replace();
  </script>
  <script src="scripts/buttonBounce.js"></script>
</html>
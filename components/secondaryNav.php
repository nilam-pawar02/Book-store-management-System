<?php
    function secondaryNav($compName,$icon)
    {
      $class= ($icon == "search")?'id="search-tg"':"";
        echo '
        <div class="cart flex items-center justify-between py-2 px-2 bg-white">
        <div class="go-back sm:cursor-pointer p-2 hover:bg-gray-100 rounded-full">
          <i data-feather="chevron-left" class="w-10 h-10"></i>
        </div>
        <h3 class="capitalize font-semibold text-2xl">'.$compName.'</h3>
        <div '.$class.' class="sm:cursor-pointer p-2 hover:bg-gray-100 rounded-full">
          <i data-feather="'.$icon.'" class="w-8 h-8"></i>
        </div>
      </div>
      ';
    }
?>
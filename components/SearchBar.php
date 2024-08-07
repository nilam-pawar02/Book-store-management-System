<?php
    function SearchBar($placeHolder="search books")
    {
        echo '
        <div id="search-bar" class="hidden lg:flex items-center bg-white w-fit max-w-[90vw] rounded-lg shadow">
        <input class=" placeholder:capitalize px-4 py-2 bg-transparent outline-none w-[100vw] max-w-[80vw] sm:w-96 capitalize" type="text" placeholder="'.$placeHolder.'">
        <div class="p-3 sm:cursor-pointer cursor-default">
            <i data-feather="search"></i>
        </div>
    </div>
             ';
    }
?>
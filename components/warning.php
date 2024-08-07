<?php
    function Warning($warnMsg,$displayProp)
    {
        echo '
        <div class="file-warn '.$displayProp.' z-20 sticky top-4 left-1/2 translate-x-[-50%] translate-y-1/2 bg-yellow-300 px-3 w-fit rounded-lg font-semibold  items-center">
        <p class="">'.$warnMsg.'</p>
        <div class="cursor-pointer py-3">
            <i class="close-warning" data-feather="x"></i>
        </div>
    </div>
        '; 
    }
?>
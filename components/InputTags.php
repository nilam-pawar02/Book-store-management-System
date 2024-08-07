<?php
    function InputTags($placeHolder)
    {
        echo '
        <div class="input-up bg-white shadow rounded-xl relative w-full">
            <h3 class=" inp-h3 capitalize absolute left-4 top-2 transition-all text-gray-700">'.$placeHolder.'</h3>
            <input class="inp-enter px-4 py-3 rounded-xl w-full" type="text">
        </div>
             ';
    }
?>
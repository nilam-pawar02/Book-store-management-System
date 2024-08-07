<?php
    function Input($title,$dbname,$id)
    {

        echo '
        <div class="rounded-xl relative w-full">
        <label for="'.$id .'" class="capitalize mb-2 block text-gray-700">'.$title.'</label>
        <input id="'.$id.'" class="inp-enter px-4 py-3 rounded-xl w-full bg-white shadow" type="text" name="'.$dbname.'">
        </div>
        ';
    }
?>
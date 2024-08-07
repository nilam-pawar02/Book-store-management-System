<?php
include '../uploads/uploadBook.php';
include 'resetDashboard.php';
    if(isset($_POST['index']))
    {
        $index = $_POST['index'];
        echo $index;
        switch($index)
        {
            case 0:
                resetDashboard();
                break;
            case 5:
                resetDashboard();
                break;
            case 10:
                 uploadBook();
                break;
        }
    }

?>
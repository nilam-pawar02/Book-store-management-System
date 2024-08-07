<?php
 include '../../connect.php';
 include '../../components/input/input.php';
    if(isset($_POST['submit'])){
        $name = $_POST['c-name'];
        $pincode = $_POST['c-pincode'];
        $country = $_POST['c-country'];

        $sql = "INSERT INTO city (`name`,`pincode`,`country`) VALUES('$name',$pincode,$country)";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            echo "data upload";
        }
    }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome</title>
    <link rel= 'icon' href= 'data:,'>
</head>
<body>
 <form method="post">
  <?php   
    Input("city name","c-name","c-name");
    Input("pinocde","c-pincode","c-pincode");
    Input("country","c-country","c-country");
         ?>
    <button type="submit" name="submit">Upload</button>
 </form>   
</body>
</html>

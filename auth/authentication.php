<?php
include '../connect.php';
include '../components/warning.php';

if (isset($_POST['register'])) {

    $image = $_FILES['profile-pic'];
    print_r($image);
    $fName = $_POST['f-name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $DOB = $_POST['dob'];
    $encriptedPwd = password_hash($password, PASSWORD_ARGON2ID);
    //  print_r($image);
    $type = 'normal';
    // check user is already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);
    if ($result) {
        // check how many rows in comes in result
        // if number of rows is >=1 then user is exists  
        if (mysqli_num_rows($result) >= 1) {
            // header('location:../signup.html');
            $row = mysqli_fetch_assoc($result);
            $dbemail = $row['email'];
            // if you want to add username in future then check dbemail and user entered email and also check dbuser and user enterd user
            // eg. if($dbemail == $email) -> email is already taken; else username is already taken

            Warning("$dbemail is already register", "flex");

        } else {

            //create new user account 
           $sql = "SELECT * FROM `users` ORDER BY `users`.`id` DESC";
           $result = mysqli_query($conn,$sql);
           $row = mysqli_fetch_assoc($result);
           $id = $row['id']+1;

            $imageName = $image['name'];
            $image_tmp = $image['tmp_name'];
            // print_r($image_tmp);
            $image_extension = explode('.', $imageName);
            $imageName = $id.$fName;
            //image extension convert array into string
            $conv_extension = strtolower($image_extension[1]);
            $extensions = array('jpg', 'jpeg', 'png', 'webp');
            //check image extension or given image extension matches or not 
            if (in_array($conv_extension, $extensions)) {
                $upload_image = '../assets/avtar/' . $imageName . "." . $image_extension[1];
                $actual_upload_image_in_DB = 'assets/avtar/' . $imageName . "." . $image_extension[1];
                move_uploaded_file($image_tmp, $upload_image);
                
                $sql = "insert into users (profile_pic,name,email,password,dob,role,created) values('$actual_upload_image_in_DB','$fName','$email','$encriptedPwd','$DOB','$type',CURRENT_TIME())";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    // echo '<div class="data-upload">data uploaded Sucessfully</div>';
                    Warning("Account Created SuccessFully", "flex");
                    // header('location:../login.html');
                } else {
                    die(mysqli_error($con));
                }

            }
        }

    } else {

        echo "server Related Error"; //if check user is in db query is not executed properly then it shows this error
    }


}
else if(isset($_POST['login'])){
    // if user logger in then redirect to the home page 
    // if(isset($_COOKIE['user']) && isset($_COOKIE['userId']))
    // header('location:../index.php');
    // uncoomment upper lines if code is running properly
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        // checking email is correct or register
        $sql = "select * from users where email= '$email'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>=1)
        {
            $row =  mysqli_fetch_assoc($result);
            $dbemail = $row['email'];
            $dbpass = $row['password'];
            $userID = $row['id'];
            $profile_pic = $row['profile_pic'];
            $user_name = $row['name'];
            $user_type = $row['role'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            // if user found then check password
            if(password_verify($pwd,$dbpass))
            {   
                // correct Password
                // logged in successflly;
                // $_SESSION['user_type']=$user_type;

               // add login history in authentication
                // this is for future checking user islogged in or not
                $sql= "INSERT INTO `authentication`(`userId`, `browser`, `isLoggedIn`, `LogTime`) VALUES ($userID,'$user_agent',1,CURRENT_TIME())";
                $result = mysqli_query($conn,$sql);
                if($result)
                {
                    setcookie('user',$user_name,0,"/");
                    setcookie('userId',$userID,0,"/");
                    setcookie('user_agent',$user_agent,0,"/");
                    setcookie('profile',$profile_pic,0,"/");
                
                    header('location:../index.php');
                }
                else echo "authentication Error";

            }
            else
            // echo "PASS incorrect<br>";
            Warning("Password is Incorrect","flex");
        }
        else{
            // echo 'email is not register';
            Warning("email is not register","flex");
        }
    }
   

?>
<?php
 include '../../connect.php';
 include '../../components/warning.php';
 if(isset($_POST['upload-book']))
 {
     $book_Name = $_POST['book-name'];
     $lang = $_POST['lang'];
     $price= floatval($_POST['price']);
     $edition= $_POST['edition'];
     $stock =  $_POST['stock'];
     $genere = $_POST['genere'];
     $publication = $_POST['pub-date'];
     $status = "Available";
     $auth_Id = 1;
     
     $book_Image = $_FILES['image'];

     $img_Name=$book_Image['name'];
     $extensions = array('jpg','jpeg','png','webp');
     $split_img = explode('.', $img_Name);
     $ext = strtolower($split_img[1]);
       
     if(count($split_img) <=2)
     {
         if(in_array($ext, $extensions))
         {
             // sql query
             $book_Image['name']= $book_Name;
             $book_tmp = $book_Image['tmp_name'];
             
             $upload_image = '../../assets/bookImages/' . $book_Image['name']. "." . $ext;
             $actual_upload_image_in_DB = 'assets/bookImages/' . $book_Image['name'] . "." . $ext;
             
             move_uploaded_file($book_tmp, $upload_image);
             
             // $sql = "INSERT INTO `bookstore`( `title`, `language`, `publication_date`, `author_id`, `price`, `image`, `edition`, `status`, `stock`, `genre`, `time`) VALUES ('$book_Name','1','$publication','1','$price','$actual_upload_image_in_DB','$edition','available','$stock','$genere',CURRENT_TIME())";
             $sql = "INSERT INTO books (`title`,`language`,`publication_date`,`author_id`,`price`,`image`,`edition`,`status`,`stock`,`genre`,`time`) VALUES('$book_Name','$lang','$publication',$auth_Id,$price,'$actual_upload_image_in_DB',$edition,'$status',$stock,'$genere',CURRENT_TIME())";
             $result= mysqli_query($conn,$sql);
             if($result){ 
               Warning("book Uploaded sucessfully","flex");
             }

         }
         else
             Warning("Please select only images","flex");        
     }
     else
     {
         Warning("images more than two dots (..) are not allowed","flex");
     }
     
 }
?>
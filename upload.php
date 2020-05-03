<?php
$connect = mysqli_connect("localhost", "root", "", "isa");
if(!empty($_FILES)) {
     $path = 'upload/' . $_FILES['file']['name'];
     if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
          $insertQuery = "UPDATE alumni_all SET img_name =('".$_FILES['file']['name']."') WHERE index_num=(SELECT index_num WHERE img_name='isakabanda')";
          if(mysqli_query($connect, $insertQuery)) {
               echo 'File Uploaded';
          }
          else {
               echo 'Some Error. Notify the Admin.';
          }
     }
}
else {
     echo 'Please also add your photograph';
}
?>

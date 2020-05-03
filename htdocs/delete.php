<?php
  $connect = mysqli_connect("localhost","id3824057_dembla812","Isa123","id3824057_isa");
  $sql = "DELETE FROM alumni_all WHERE index_num=(SELECT index_num WHERE img_name='isakabanda')";
  $result = mysqli_query($connect,$sql);
  $json_array = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $json_array[] = $row;
  }
?>

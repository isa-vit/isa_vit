<?php
  $connect = mysqli_connect("localhost","id3824057_dembla812","Isa123","id3824057_isa");
  $sql = "SELECT * FROM alumni_all;";
  $result = mysqli_query($connect,$sql);
  $json_array = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $json_array[] = $row;
  }
  echo json_encode($json_array);
?>

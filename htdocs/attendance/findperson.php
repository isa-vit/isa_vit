<?php

  $connect = mysqli_connect("localhost","id3824057_dembla812","Isa123","id3824057_isa");

  $data = json_decode(file_get_contents("php://input"));

  if(count($data) > 0){
    $regNum  = mysqli_real_escape_string($connect, $data->regNum);
  }

  $sql = "SELECT * FROM absentpresent WHERE RegNum='$regNum'";
  $result = mysqli_query($connect,$sql);
  $json_array = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $json_array[] = $row;
  }
  echo json_encode($json_array);
?>

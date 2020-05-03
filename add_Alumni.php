<?php

  $connect = mysqli_connect("localhost","id3824057_dembla812","Isa123","id3824057_isa");

  $data = json_decode(file_get_contents("php://input"));

  if(count($data) > 0){
    $name  = mysqli_real_escape_string($connect, $data->name);
    $mobile = mysqli_real_escape_string($connect, $data->mobile);
    $email = mysqli_real_escape_string($connect, $data->email);
    $job = mysqli_real_escape_string($connect, $data->job);
    $city = mysqli_real_escape_string($connect, $data->city);
    $year = mysqli_real_escape_string($connect, $data->year);
  }

    $sql = "INSERT INTO alumni_all(name,mobile,email,job,city,year) VALUES ('$name',$mobile,'$email','$job','$city',$year)";
    echo($sql);
		$conn =  mysqli_query($connect,$sql);
    if($conn)
	    echo "successfully uploaded";
    else {
      echo "upload unsuccessful";
    }

?>

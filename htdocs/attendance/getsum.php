<?php
$connect = mysqli_connect("localhost","id3824057_dembla812","Isa123","id3824057_isa");

$data = json_decode(file_get_contents("php://input"));

if(count($data) > 0){
  $regNum  = mysqli_real_escape_string($connect, $data->regNum);
}
$sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'absentpresent'";
$result = mysqli_query($connect,$sql);
$value = mysqli_fetch_array($result);
$row = $value[0];
$row = (int)$row;
$row = $row - 1;

$sql1 = "SELECT sum(dt2208) from absentpresent where RegNum = '$regNum'";
$result = mysqli_query($connect,$sql1);
$value = mysqli_fetch_array($result);
$sum = $value[0];
$sum = (int)$sum;
$sum = 100*$sum;

$percent = ($sum/$row);
echo($percent);
?>

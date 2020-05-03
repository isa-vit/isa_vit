<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['login_uname']) || $_SESSION['login_uname']=='none'){
    header("location:index.php");
} 
         $user_name= $_SESSION["login_uname"];

$qid=$_REQUEST['q_id'];
$cp=$_REQUEST['cp'];
$sp=$_REQUEST['sp'];
$bm=$_REQUEST['bid'];
$qid=($qid - 123)/896;
$dbFormat = date('H:i:s', time());
$gone=0;
$ms=mysqli_connect("localhost","id4835824_root","shivamsingh"));
	$temp=mysqli_select_db($ms,"id4835824_hackosp");
	$query="SELECT * FROM bid_table where UNAME='$user_name'";
	$result=mysqli_query($ms,$query);
	$row=mysqli_fetch_assoc($result);
	$questions=trim($row['QNO']);
	$bidmon=trim($row['BMONEY']);
	$time=$row['btime'];
	if($time=='00:00:00'){
		$time=$dbFormat;
	}
	$q_break=explode("#",$questions);
	if (in_array("q$qid", $q_break)){
		echo " already bidded!!!";
	}else{
	$questions=$questions."#q$qid";

	$bidmon=$bidmon."#$bm";

	$query="UPDATE bid_table SET QNO='$questions',BMONEY='$bidmon',btime='$time'  WHERE bid_table.UNAME='$user_name'";
	$result=mysqli_query($query);
		echo 'bid added succesfully';
}



?>
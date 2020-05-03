<?php

$ms=mysqli_connect("localhost","id4835824_root","shivamsingh"));
	mysqli_select_db($ms,"id4835824_hackosp");
		$user_name=$_REQUEST['uname'];
		$x="";
	$bmoney=$_REQUEST['bmoney'];
	$bidder=$_REQUEST['bidder'];
		$qno=$_REQUEST['qno'];
	$query="SELECT * FROM details WHERE UNAME='$user_name'";
	$result=mysqli_query($ms,$query);
	 $row=mysqli_fetch_assoc($result);
	 $questions=$row['PROBLEM_STAT'];
	 $quest_arr=explode("#",$questions);
	 for($i=1;$i<sizeof($quest_arr);$i++){
	 	if($quest_arr[$i]=="$qno")continue;
        $temp= $quest_arr[$i];
        $x.="#$temp";
	}
	$vmoney=$row['VMONEY'] + $bmoney*0.7;

	$query="UPDATE details SET PROBLEM_STAT='$x' , VMONEY=$vmoney WHERE details.UNAME = '$user_name'";
	mysqli_query($ms,$query);

	$xn="";
	$xnb="";
	$query="SELECT * FROM bid_table WHERE UNAME='$user_name'";
	$result=mysqli_query($ms,$query);
	 $row=mysqli_fetch_assoc($result);
	 $questions=$row['QNO'];
	 $bidded=$row['BMONEY'];
	 $quest_arr=explode("#",$questions);
	 $bid_arr=explode("#",$bidded);
	 for($i=1;$i<sizeof($quest_arr);$i++){
	 	if($quest_arr[$i]=="$qno")continue;
        $temp= $quest_arr[$i];
        $tempb=$bid_arr[$i];
        $xn.="#$temp";
        $xnb.="#$tempb";
	}
	$query="UPDATE bid_table SET QNO='$xn' , BMONEY='$xnb' WHERE bid_table.UNAME = '$user_name'";
	mysqli_query($ms,$query);


	$query="SELECT * FROM details WHERE UNAME='$bidder'";
	$result=mysqli_query($ms,$query);
	 $row=mysqli_fetch_assoc($result);
	 $questions=$row['PROBLEM_STAT'];
	 $questions.="#$qno";

	 if($row['VMONEY'] < $bmoney)echo "sorry not enough money!!!";

	 else{
	$vmoney=$row['VMONEY'] - $bmoney;

	$query="UPDATE details SET PROBLEM_STAT='$questions' , VMONEY=$vmoney WHERE details.UNAME = '$bidder'";
	mysqli_query($ms,$query);



	echo "done";
}

	

?>
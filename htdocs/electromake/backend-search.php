    <?php

    /* Attempt mysqli server connection. Assuming you are running mysqli

    server with default setting (user 'id4835824_root' with no password) */


     

    // Check connection
$x="<tr>    
                <th>User name</th>
                <th>Wallet balance</th>
                <th>Quiz Points</th>
                <th>Questions Taken</th>
            </tr>";
   $ms=mysqli_connect("localhost","id4835824_root","shivamsingh");
    mysqli_select_db($ms,"id4835824_hackosp");
    $user_name=$_REQUEST['term'];
    $query="SELECT * FROM details WHERE UNAME LIKE '%$user_name%' ";

        $result=mysqli_query($ms,$query);
        while( $row=mysqli_fetch_assoc($result)){
        $user=$row['UNAME'];
        $money_present=$row['VMONEY'];
        $quiz_points=$row['QUIZ_POINTS'];
        $problems=explode('#',$row['PROBLEM_STAT']);
        $bidding=$row['Q_BID'];
//        echo "$user";

$x.="     <tr WIDTH='800px'><td>$user</td><td>$money_present</td><td>$quiz_points</td>";
        for($i=1;$i<sizeof($problems);$i++){
            $p=$problems[$i];
            $x.="<td>$p</td>";
        }
        $x.="</tr>";

        }

    echo $x;



    ?>


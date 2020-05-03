<?php
session_start();
if(!isset($_SESSION['login_uname']) || $_SESSION['login_uname']!='isavitspark2k18'){
    header("location:index.php");
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electromake</title>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400">   <!-- Google web font "Open Sans", https://fonts.google.com/ -->
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">           <!-- Font Awesome, http://fontawesome.io/ -->
<link rel="stylesheet" href="css/bootstrap.min.css">                                 <!-- Bootstrap style, http://v4-alpha.getbootstrap.com/ -->
<link rel="stylesheet" href="css/tooplate-style.css">                              <!-- Templatemo style -->
 <script type ="text/javascript" src="jquery-3.1.0.min.js"></script> 
  <script type = "text/javascript" src="jquery-ui.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>         
<script type="text/javascript">
 $(document).ready(function(){
    });
 var w;
 var y;
 var x;
     function check(w,x,y){
        bmoney=$("#bid"+w).val();
        bidder=$("#bid1"+w).val();
          if(!confirm("are you sure"))return;
          $.ajax({
              url: "bidfinal.php?uname="+y+"&qno="+x+"&bmoney="+bmoney+"&bidder="+bidder, 
        type: "POST",             
        data:  new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,     
        success: function(data){
           $("#all_q").html(data);

        }
      });
   
}
</script>
</head>


<body>
           <div class="container-fluid" style="overflow:auto">
            <div class="tm-body">
                <div class="tm-sidebar sticky">
                    <section id="welcome" class="tm-content-box tm-banner margin-b-15">
                        <div class="tm-banner-inner">
                            <i class="fa fa-film fa-4x margin-b-40"></i>
                           <h1>Electromake</h1>
                            <p class="tm-banner-subtitle">ADMIN PAGE</p>         
                        </div>                    
                    </section>
                    <nav class="tm-main-nav" style="height:400px; overflow-y:scroll">
                       <ul class="tm-main-nav-ul">
                            <li class="tm-nav-item"><a href="userreg.php" class="tm-nav-item-link tm-button">User Registration</a>
                            </li>
                            <li class="tm-nav-item"><a href="adminpage1.php" class="tm-nav-item-link tm-button">Users</a>
                            </li>
                            <li class="tm-nav-item"><a href="adminpage2.php" class="tm-nav-item-link tm-button">Components bought</a>
                            </li>
                            <li class="tm-nav-item"><a href="adminpage3.php" class="tm-nav-item-link tm-button">Problem Statements</a>
                            </li>
                            
                            <li class="tm-nav-item"><a href="contact.php" class="tm-nav-item-link tm-button">Bidding</a>
                            </li>
                            </ul>
                    </nav>
                </div>
                
               
            </div>

        </div>             

    <style>
        div.MAIN 
        {
            margin: 0px 15px 0px 15px;
            box-shadow: 1px 2px 1px 2px #969696;
            border-radius: 15px 50px;
            padding: 1em;
            color: white;
            background-color:#6a5acd;
            clear: left;
            margin-left: 170px;
            text-align: center;
        }
        div.statement
        {
        margin: 0px 15px 0px 15px;
        padding: 67px 0px 0px 0px;
        box-shadow: 1px 2px 1px 2px #969696;
        border-radius: 15px 50px;
        background: #f0f0f0;
       
        padding: 1em;
        overflow: hidden;
        }
        label{
        display: inline-block;
        width: 250px;
        text-align: right;
        }
        input 
        {
        display: inline-block;
        width: 15%;
        padding: 12px 20px;
        border-radius: 8px;
        color: blue;
        }
        input:focus 
        {
        background-color: rgb(208, 255, 177);
        }
        input[type=submit]
        {
        background-color: #4CAF50;
        border: none;
        color: white;
  
        text-decoration: none;
        cursor: pointer;
        margin-left: 45%;
        
        text-align: center;
        }

    </style>
<div class="cont">
        <header>
            <h1>Biding</h1>
        </header>

    <BR>


<?php

    
$ms=mysqli_connect("localhost","id4835824_root","shivamsingh");
    $temp=mysqli_select_db($ms,"id4835824_hackosp");
     $query="SELECT * FROM bid_table ORDER BY btime";
    $result=mysqli_query($ms,$query);
    while( $row=mysqli_fetch_assoc($result)){
        if($row['btime']=='00:00:00')continue;
    $questions=$row['QNO'];
    $uname=$row['UNAME'];
    $bmoney=$row['BMONEY'];
    $quest_arr=explode("#",$questions);
    $barray=explode("#",$bmoney);

    $myfile = fopen("problem_statement.txt", "r") or die("Unable to open file!");

    $questions= fread($myfile,filesize("problem_statement.txt"));
    $Quest=explode('@',"$questions");

    for($i=1;$i<sizeof($quest_arr);$i++){
        $temp= $quest_arr[$i];
        $tquest=explode("q",$temp);
        $x=$tquest[1];
        $quest_is=$Quest[$x-1];
        $opt=explode('=>',$quest_is);
        $bidmon=$barray[$i];
        $quest_main=$opt[0];
    $c_price=$opt[1];
    $s_price=$opt[2];
    $quest_code=$opt[3];
$tempy=$quest_code*896+123;
$tid="$uname".""."$temp";
print<<<here
             <div class="statement">
             <p>By: $uname</p>
            <P>Q$i ) $quest_main</P>
               <p> Cost price : $c_price Rs </p>
               <p> Selling price for fully completed circuit: $s_price Rs </p>
               <LABEL>Max Bid :</LABEL><INPUT TYPE="number" value='0' id="bid$tid" >
               <LABEL>Bider :</LABEL><INPUT TYPE="text" id="bid1$tid" ><br><b>
                <label>Bid Set : $bidmon </label>
                                <br><br><input type="submit" value="Submit" style="padding: 0px auto;" onclick="check('$tid','$temp','$uname')">
    </div>
    <br>
here;
}
}
/*
   

*/

    


?>
    

    </div>

</html>
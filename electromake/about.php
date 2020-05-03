<?php
session_start();
if(!isset($_SESSION['login_uname']) || $_SESSION['login_uname']=='none'){
    header("location:index.php");
} 
         $user_name= $_SESSION["login_uname"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electromake</title>
<!--

Template 2094 Mason

http://www.tooplate.com/view/2094-mason

-->
<!-- load stylesheets -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400">   <!-- Google web font "Open Sans", https://fonts.google.com/ -->
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">           <!-- Font Awesome, http://fontawesome.io/ -->
<link rel="stylesheet" href="css/bootstrap.min.css">                                 <!-- Bootstrap styles, https://getbootstrap.com/ -->
<link rel="stylesheet" href="css/tooplate-style.css">                              	 <!-- Templatemo style -->

  <script type ="text/javascript" src="jquery-3.1.0.min.js"></script> 
  <script type = "text/javascript" src="jquery-ui.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

<script type="text/javascript">
  $(document).ready(function(){   
$("#quiz_form").on("submit",(function(e) { 
            e.preventDefault();
      
       if(! confirm("are you sure"))return;          
          $.ajax({
              url: "quiz_check.php", 
        type: "POST",             
        data:  new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,     
        success: function(data){
          alert(data);
        }
      });
              }));
});
 
</script>
</head>

<body>
       <div class="container-fluid">
            <div class="tm-body">
                <div class="tm-sidebar sticky">
                    <section id="welcome" class="tm-content-box tm-banner margin-b-15">
                        <div class="tm-banner-inner">
                            <i class="fa fa-film fa-4x margin-b-40"></i>
                           <h1>Electromake</h1>
                            <p class="tm-banner-subtitle">ISA's legacy event</p>  
                            <?php

                               echo "<p>Welcome: $user_name</p>";
                            $ms=mysqli_connect("localhost","id4835824_root","shivamsingh");
                                mysqli_select_db($ms,"id4835824_hackosp");
                                    $query="SELECT VMONEY FROM details WHERE UNAME='$user_name'";
                                    $result=mysqli_query($ms,$query);
                                    $row=mysqli_fetch_assoc($result);
                                    $money=$row['VMONEY'];
                                    echo "<p>Money Left: $money</p>";
                                }else{
                                    echo "no internet connection";
                                }


                            ?>                        
                        </div>                    
                    </section>
                    <nav class="tm-main-nav" style="height:400px; overflow-y:scroll">
                        <ul class="tm-main-nav-ul">
                            <li class="tm-nav-item"><a href="index.html" class="tm-nav-item-link tm-button active">Rules</a>
                            </li>
                            <li class="tm-nav-item"><a href="timeline.php" class="tm-nav-item-link tm-button">Market</a>
                            </li>
                            <li class="tm-nav-item"><a href="about.php" class="tm-nav-item-link tm-button">Quiz</a>
                            </li>
                             <li class="tm-nav-item"><a href="comp.php" class="tm-nav-item-link tm-button">Components Bought</a>
                            </li>
                            <li class="tm-nav-item"><a href="prstb.php" class="tm-nav-item-link tm-button">Problem Statements </a>
                            </li>
                             <li class="tm-nav-item"><a href="work.php" class="tm-nav-item-link tm-button">Workplace</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> 
        </div> 
<style>
div.container {
    border-radius: 15px 50px;;
    padding-left: 10cm ;
    width: auto;
}

div.nav1 {
    box-shadow: 1px 2px 1px 2px #969696;
    border-radius: 15px 50px;
    background: #f0f0f0;
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

article {
    margin: 0px 15px 0px 15px;
    padding: 67px 0px 0px 0px;
    box-shadow: 1px 2px 1px 2px #969696;
    border-radius: 15px 50px;
    background: #f0f0f0;
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
</style>


        <div class="container">

<header>
   <h1>Quiz</h1>
</header>
<br>  
<form method="POST" id="quiz_form">
<?php
$myfile = fopen("questions.txt", "r") or die("Unable to open file!");


$questions= fread($myfile,filesize("questions.txt"));
$Quest=explode('@',"$questions");

$num_quest=sizeof($Quest);

for($i=1;$i<=$num_quest;$i++){
  $opt=explode("=>", $Quest[$i -1 ]);
$quest_1=$opt[0];
$opt1=$opt[1];
$opt2=$opt[2];
$opt3=$opt[3];
$opt4=$opt[4];
$quest_code=$opt[5];
$right_ans=$opt[6];
$tempx=$right_ans*1096+123;
$tempy=$quest_code*896+123;
    print <<<here
  <div class="nav1">
      <H3> Question $i : </H3>
  </div>

  <article>
    <p>$quest_1</p>
   
    <input type="radio" name="q$i" value="op1" > $opt1 <br>
    <input type="radio" name="q$i" value="op2"> $opt2 <br>
    <input type="radio" name="q$i" value="op3"> $opt3 <br>
    <input type="radio" name="q$i" value="op4" > $opt4 <br>
    <input type="hidden" name="rit1_$i" value="$tempx" > 
    <input type="hidden" name="rit2_$i" value="$tempy" > 
  </article>
<br>
here;

}

fclose($myfile);
//for(int i=0;i<)

?>


<input style="position: fixed;left: 90%;top:5%;" onclick="check()"  value="submit" type="submit"> 
</form>


</div>
    

    <script src="js/jquery-1.11.3.min.js"></script>     <!-- jQuery (https://jquery.com/download/) -->

</body>
</html>

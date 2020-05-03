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

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400"> <!-- Google web font "Open Sans", https://fonts.google.com/ -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">         <!-- Font Awesome, http://fontawesome.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                               <!-- Bootstrap styles, https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate-style.css">                            <!-- Templatemo style -->
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

          <div class="yetable">

        <header>
            <h1>Components purchased</h1>
        </header>   
        <br>

      
         <section >
             <table style="width: 60%;margin-top:50px;">
             <tr>    
                <th></th>
                <th >Price</th>
                <th>Quantity</th>
            </tr>

    <?php

        $ms=mysqli_connect("localhost","id4835824_root","shivamsingh");
    mysqli_select_db($ms,"id4835824_hackosp");
    
    $query="SELECT * FROM products_buyed WHERE USERS='$user_name'";
    $result=mysqli_query($ms,$query);
    $total_price=0;
    $row=mysqli_fetch_assoc($result);
     $Components_bought=$row['PROD_BOUGHT'];
        $total_price=$row['T_PRICE'];
        $Components_bought=trim($Components_bought);
        $products=explode('<=>',$Components_bought);
        for($i=0;$i<sizeof($products)-1;$i++){
        $p_detail=explode('-',$products[$i]);
        $p_name=$p_detail[0];
        $p_quant=$p_detail[1];
            $query2="SELECT PRICE FROM products WHERE PROD_NAME='$p_name'";
            $result2=mysqli_query($ms,$query2);
            $row2=mysqli_fetch_assoc($result2);
            $prod_pr=$row2['PRICE'];
print<<<here
        <tr>    
            <th>$p_name</th>
            <th id="res">$prod_pr</th>
            <th >$p_quant</th>
        </tr>
here;
    }
print("<tr><td></td></tr><tr><td>Total Cost<td>$total_price</td></tr>");



    ?>
            
           
         </table><br>


        </section>   
        </div>
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="js/imagesloaded.pkgd.min.js"></script> <!-- https://masonry.desandro.com/ -->
        <script src="js/masonry.pkgd.min.js"></script> <!-- https://masonry.desandro.com/ -->
        
        <!-- Templatemo scripts -->
   
    </body>
    </html>
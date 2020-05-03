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

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400"> <!-- Google web font "Open Sans", https://fonts.google.com/ -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">         <!-- Font Awesome, http://fontawesome.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                               <!-- Bootstrap styles, https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate-style.css">                            <!-- Templatemo style -->
      <script type ="text/javascript" src="jquery-3.1.0.min.js"></script> 
  <script type = "text/javascript" src="jquery-ui.js"></script>
    <script type="text/javascript">
        
         function checkS(){
    var temp=$("#uname").val();
            alert(temp);
          $.ajax({
              url: "show_questions.php?uname="+temp+"&type=0", 
        type: "POST",             
        data:  new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,     
        success: function(data){
                       alert(data);
           $("#all_q").html(data);

        }
      });

}
$(document).ready(function(){

});
    </script>
    <script type="text/javascript">

        function check(w,x,y,z){
                var temp=$("#uname").val();
                if(! confirm("are you sure"))return;    
                 $.ajax({
              url: "show_questions.php?uname="+temp+"&type=1&qno="+w+"&cp="+y+"&sp="+z, 
        type: "POST",             
        contentType: false,       
        cache: false,             
        processData:false,     
        success: function(data){
           alert(data);
           $("#all_q").html(data);

        }
      });

        }
        
       
    </script>

      </head>

      <body>
        <div class="container-fluid" >
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
 
        
        text-align: center;
        }

    </style>

<div class="cont">
        <header>
            <h1>Problem Statements</h1>
        </header>

    <br>
    Name of the Team Leader:
            <input name="name" placeholder="Name" id="uname" type="text" >
            <button onclick="checkS()"> submit</button>
            <br><br>    
        <div id="all_q">
    
    <br>
    </div>
</div>

        
   
    </body>
    </html>
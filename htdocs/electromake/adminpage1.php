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

 $(document).ready(function(){

        $('.search-box input[type="text"]').on("keyup input", function(){

            /* Get input value on change */

            var inputVal = $(this).val();

            var resultDropdown = $(this).siblings(".result");


            if(inputVal.length){

                $.get("backend-search.php", {term: inputVal}).done(function(data){

                    // Display the returned data in browser
 $("#tlist").html(data);
                 //   resultDropdown.html(data);

                });

            } else{

                $("#tlist").html('');

            }

        });
    });

       
 
   function search_info(){

            var temp=$("#uname_info").val();
            alert(temp);
             $.ajax({
              url: "profile.php?uname="+temp, 
        type: "POST",             
        data:  new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,     
        success: function(data){
           
          alert(data);

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

        <div class="search-box" style="margin-left:40%;margin-top: 4%;">
         <header>
            <h1> Users</h1>
        </header>
        <br><br>
            User Database
            <input name="name" id="uname_info" placeholder="Name" type="text">
           
           <br><br><br>
            <table style="width:80%;" id="tlist">
            
            

            

         </table>

        </div>


        
   
    </body>
    </html>
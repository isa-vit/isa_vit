<?php
session_start();
 $_SESSION["login_uname"]="none";


?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Electromake</title>
  <link rel="stylesheet" type="text/css"  href="style.css"/>

 	<script type ="text/javascript" src="jquery-3.1.0.min.js"></script> 
	<script type = "text/javascript" src="jquery-ui.js"></script>
  <script type="text/javascript">

$(document).ready(function(){
  	$("#request_form_request").on("submit",(function(e) { 
  					e.preventDefault();
  				
  	  		  		$.ajax({
  	  		  	url: "login.php", 
				type: "POST",             
				data:  new FormData(this), 
				contentType: false,       
				cache: false,             
				processData:false,     
				success: function(data){
					alert(data);
					if(data=="welcome admin")
						window.location.href="userreg.php";
					else
						window.location.href="timeline.php";
				}
			});
  	  		  	}));
  });
  </script>

</head>

<body>

  <div style="background-color:blue;" class="bodyy"></div>
		<div class="grad"></div>
		<div class="header">

			<div>Electro<span>Make</span></div>
		</div>
		<br>
		<div class="login">
			<form id="request_form_request">
				<input type="text" placeholder="Username" name="username"><br>
				<input type="password" placeholder="Password" name="password"><br>
				<button style="width: 20%;margin-top: 15px;margin-left: 75%;font-size: 20px;cursor: pointer;padding:1% 1% 1% 1%;background-color: rgba(245,230,27,0.2);border-radius: 10px;text-align: center;">Login</button>
				</form>
		</div>


</body>

</html>

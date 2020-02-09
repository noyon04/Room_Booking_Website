<!DOCTYPE html>
<html lang="en">
<head>
<script>

function del_cookie(name) {
			document.cookie = name + 
				'=; expires=Thu, 01-Jan-05 00:00:01 GMT;';
			}				
			
			
function onload(){
		 del_cookie("email");
		 var e = document.cookie;
		 var e2=e.includes("alt")
		 if (e2==true)
		 {
			 alert("wrong email and password combination");
			 del_cookie("alt");
		 }
	}
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
};
</script>
<title>Login</title>


</head>
<body onload='onload()'>
<div w3-include-html="hmcss.php"></div>
<div class="header">
  <img src="NEUB.jpg"  style='width:100%;height:200px'  >
</div>

<div class="navbar">
  <a href="Regi.php" class="right">Register</a>
  <a href="Login.php" class="right">Login</a>
  <a href="Home.php" class="right">Home</a>
 
</div>

<div class="row">
  
  <div class="main">
     <div class="login">
	
	<form method="post" action="llogin.php">
  	<?php //include('errors.php'); ?>
  	<div class="input-group">
  		<label>Email:</label>
  		<input type="text" name="email" required >
  	</div>
  	<div class="input-group">
  		<label>Password:</label>
  		<input type="password" name="password" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn2" name="login_user">Login</button>
  	</div>
  	<p>
  		Not a member yet? <a href="Regi.php">Register</a>
  	</p>
  </form>
	
	</div>
	
</div>

<div class="footer">
  
</div>
 <script>
includeHTML();
</script>
</body>
</html>

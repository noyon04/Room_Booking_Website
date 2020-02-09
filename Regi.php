<!DOCTYPE html>
<html lang="en">
<head>
<script>
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
<title>Register</title>


</head>
<body>
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
	
    <form method="POST" action="rregi.php">
  	
  	<div class="input-group">
  	  <label>Teacher ID</label>
  	  <input type="text" name="t_id" required>
  	</div>
  	<div class="input-group">
  	  <label>Full Name</label>
  	  <input type="text" name="name" required >
  	</div>
	<div class="input-group">
  	  <label>Department</label>
	  <select type="text" name="deptname" required>
			<option value="" disabled selected>Select Department</option>
			<option value="cse">CSE</option>
			<option value="bba">BBA</option>
			<option value="eng">ENG</option>
			<option value="llb">LLB</option>
	</select>
  	</div>
	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required >
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" required>
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" required>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn2" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">LOGIN</a> Now
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

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
<title>Home</title>


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
    <h2>WELCOME!!</h2>
    <h5>About NEUB</h5>
	
     <img src="NEUB2.jpg" style="height:300px;width:400px;">
    
    <p> Introduction: The present world has been passing 
	through inevitable but irreversible process of globalization. 
	Bangladesh is a member of the world village and has been struggling 
	for survival facing challenges in the fields of economic, social, political, 
	environmental, human resource development and so on. For making the nation capable 
	of facing the challenges, the present Government of the People’s Republic of Bangladesh 
	pursuing a Vision-2021 has very aptly emphasized on the expansion of higher education of
	quality throughout the country.
	<p>
	<br>
    <h2>Info: Process of Registration & Room Booking</h2>
    <p>Registration: Only Teachers can registrate and request to book any room.
	At first a teacher should register with his full information on Registration Page.
	After checking the information, the administrator will sent an email to him/her with a user id and password.
	Then he/she can Login.</p>
	
	<p>Room Booking: There are several department in this varsity. Each department usually use some
     separate rooms for extra classes or makeup classes.In this site, One teacher can request to book any 
	 room for extra/makeup classes and then administrator will confirm it. 
  
   
    </div>
	<div class="side">
    <h2>About This Site</h2>
   <img src="room.jpg" style="height:200px;width:300px;">
   
    <p>This Site enables one teacher to book any room for extra class or makeup classes.
	For this, the teacher should register on this site. Note that only teachers can
	register and send request to book any room.</p>
    
    
  </div>
</div>

<div class="footer">
  
</div>
 <script>
includeHTML();
</script>
</body>
</html>

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
<title>Login</title>


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
    	<div w3-include-html="errors.php"></div>
 <?php
	
	//session_start();

// initializing variables
$t_id = "";
$name = "";
$dept = "";
$email   = "";
$errors = 0; 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'room_b_s');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $t_id = mysqli_real_escape_string($db, $_POST['t_id']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $dept = mysqli_real_escape_string($db, $_POST['deptname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if ($password_1 != $password_2) {
	$errors+=1;
		echo"The two password doesn't match<br><a href='regi.php'> back</a>";
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM register WHERE t_id='$t_id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['t_id'] === $t_id) {
		$errors+=1;
		echo"Teacher ID already exists <br>";
      
    }

    if ($user['email'] === $email) {
		$errors+=1;
		echo"email already exists";
      
    }
  }
 //echo $errors;
  // Finally, register user if there are no errors in the form
  if ($errors == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO register (t_id, name, dept, email, pass) 
  			  VALUES('$t_id','$name','$dept', '$email', '$password_1')";
  	mysqli_query($db, $query);
  
	// echo 'q='.$q.'<br>';
	 if($db->query($query)===TRUE){
		 //echo"New record created successfully";
	 } else{
		 echo "error:".$query. "<br>".$db->error;
	//
	 }	
  	echo "Thank You. We will send an email within 24 hours.";	
  	
  
  }
}



		
		
	

?>
	
</div>

<div class="footer">
  
</div>
 <script>
includeHTML();
</script>
</body>
</html>

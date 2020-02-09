<!DOCTYPE html>
<html lang="en">
<head>
<script>

function wron()
{
	
	location.replace("/admin.php");
	alert('wrong email or password combination');
	document.cookie="alt=";

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


    <?php include('errors.php'); ?>
	<?php
	
	error_reporting(0);
	$db = mysqli_connect('localhost', 'root', '', 'room_b_s');
	if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "SELECT * FROM admin WHERE username='$email' AND pass='$password'";
  	$results = mysqli_query($db, $query);
	$user = mysqli_fetch_assoc($results);
	if ($user) { // if user exists
		if ($user['username'] === $email) {
		
		}

	
	
		if ($user['pass'] === $password) {
			
		
		
		
		
		header("Location: ashedule.php");
		exit;
		
		 //include('C:\xampp\htdocs\myacc.php'); 
		//echo '<script>
		//return refresh();
		//function refresh()
		//{
			//window.location.reload(true);
		//}
		//</script>';
 
			}
  }
  else {
  		echo "<script>
			
			wron();
		
		</script>";
		
		//header("Location: /Login.php");
		//exit;
		
  	}
  	// if (mysqli_num_rows($results) == 1) {
  	  // $_SESSION['emaiil'] = $username;
  	  // $_SESSION['success'] = "You are now logged in";
  	  
  	// }
	
  }
}

?>
	
</div>

 <script>
includeHTML();
</script>
</body>
</html>

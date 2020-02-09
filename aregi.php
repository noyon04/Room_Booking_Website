<?php
	$db = mysqli_connect('localhost', 'root', '', 'room_b_s');
	
	
	$sql="SELECT * FROM register";
	
	
	
	$records=mysqli_query($db,$sql);
	
	
	
?>
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
<title>Register requests</title>


</head>
<body>
<div w3-include-html="hmcss.php"></div>
<div class="header">
  <img src="NEUB.jpg"  style='width:100%;height:200px'  >
</div>

<div class="navbar">
  <a href="ashedule.php" class="right">Sheduled class</a>
  <a href="arequest.php" class="right">Reqeusted Rooms</a>
  <a href="abooked.php" class="right">Booked Rooms</a>
  <a href="aregi.php" class="right">Register request</a>
    <a href="arri.php" class="right">Registered</a>
</div>
<div class="row">
  
  <div class="main">
  
  </div>
	<?php
    include('ccc.php'); 
	
	//echo $ids[0];
?>
<?php
if (isset($_GET['update'])) {

 $servername="localhost";
$username="root";
$password= "";
$dbname="room_b_s";
$ema=$_GET['email'];
$pas=$_GET['pass'];




$conn = new mysqli($servername,$username,$password,$dbname);	
$rqu2= "INSERT INTO login (email,pass) VALUES ('$ema','$pas')";
	if($conn->query($rqu2)===TRUE){
		
	} else{
		
	}
$jo=$_GET['id'];
$rqu3= "UPDATE register SET confirm = '1' WHERE register.id = '$jo'";
if($conn->query($rqu3)===TRUE){
		
} else{
		
}
header("Location: aregi.php");
		exit;

}



?>
	
</div>
<table id="customers" align="center">
<tr>

<td colspan="5">
<h2>Register Requests</h2>
</td>
</tr>

<tr>
  
    <th>Teacher Id</th>
    <th>Name</th>
    <th>Email</th>
	<th>Dept</th>
	<th>Confirmation</th>
	
	
	
  </tr>
  <?php while($ru=mysqli_fetch_assoc($records))
  {
	 
	
	
	
	
			
	 
	  
		echo "<tr>";
		echo"<td>";
		echo $ru['t_id'];
		echo "</td>";
	  echo"<td>";
	  echo $ru['name'];
	  
	  echo "</td>";
	  echo"<td>";
	  echo $ru['email'];
	  echo "</td>";
	  
	  echo"<td>";
	echo $ru['dept'];
	echo "</td>";
	
	echo"<td>";
	  echo "<form method='GET' class='btn3'>";
	  echo "<input type='hidden' name='id' value='".$ru['id']."'>";
	  echo "<input type='hidden' name='email' value='".$ru['email']."'>";
	  echo "<input type='hidden' name='pass' value='".$ru['pass']."'>";
	  
	  if($ru['confirm']==1)
	  {
		  echo "<p style='color:black;'>Confirmed</p>";
	  }
	  else{
		  
	  echo "<input type='submit' name='update' id='update'  Value='Confirm'>";
	  }//echo "<input type='submit' name='delete'  Value='Delete'>";
	  echo "</form>";
	  echo "</td>";
	  echo "</tr>";
	  }
	  
	  
  
  ?>





 <script>
includeHTML();
</script>
</body>
</html>
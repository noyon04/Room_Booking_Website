<?php
	$db = mysqli_connect('localhost', 'root', '', 'room_b_s');
	$ct=$_COOKIE['email'];
	$ids2=explode(' ', $ct);
	
	$sql="SELECT * FROM request where request.email='". $ids2[0]. "'";
	
	
	
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
<title>My Account</title>


</head>
<body>
<div w3-include-html="hmcss.php"></div>
<div class="header">
  <img src="NEUB.jpg"  style='width:100%;height:200px'  >
</div>

<div class="navbar">
  <a href="myacc.php" class="right">My Account</a>
  <a href="reqeust.php" class="right">Requested Rooms</a>
  <a href="rooms.php" class="right">Available Rooms</a>
  <a href="home2.php" class="right">Home</a>
</div>
<div class="row">
  
  <div class="main">
  
  </div>
	<?php
    include('ccc.php'); 
	$ct=$_COOKIE['email'];
	$ids=explode(' ', $ct);
	//echo $ids[0];
?>
<?php
if (isset($_GET['update'])) {
$jo=$_GET['id'];
 $servername="localhost";
$username="root";
$password= "";
$dbname="room_b_s";

$conn = new mysqli($servername,$username,$password,$dbname);	
$rqu2= "DELETE FROM request WHERE request.id = '$jo'";
	if($conn->query($rqu2)===TRUE){
		
	} else{
		
	}
	header("Location: reqeust.php");
		exit;
}


?>
	
</div>
<table id="customers" align="center">
<tr>
<td colspan="5">
<h2>Requested Rooms</h2>
</td>
</tr>

<tr>
  
    <th>Date</th>
    <th>Time</th>
    <th>Room No.</th>
	<th>Confirmation</th>
	<th>Cancel/Delete </th>
	
	
	
  </tr>
  <?php while($ru=mysqli_fetch_assoc($records))
  {
	  
	  $startdate = strtotime("Today");
	  $hh=date('M-d-Y-D', $startdate);
	   
	 
	  $kk=$ru['date'];
	  if($kk>=$hh)
	  {
		echo "<tr>";
		echo"<td>";
		echo $ru['date'];
		echo "</td>";
	  echo"<td>";
	  $g=$ru['time'];
	  if($g==1)
		  echo "8.30-9.55";
	  else if($g==2)
		  echo "10.00-11.25";
	  else if($g==3)
		  echo "11.30-12.55";
	  else if($g==4)
		  echo "01.00-02.25";
	  echo "</td>";
	  echo"<td>";
	  echo $ru['room'];
	  echo "</td>";
	  echo "<td>";
	  if($ru['confirm']==1)
	  {
		  echo "<p style='color:black;'>confirmed</p>";
		 echo "</td>";
	  echo "<td>";
	  echo "<form method='GET' class='btn3'>";
	  echo "<input type='hidden' name='id' value='".$ru['id']."'>";
	  echo "<input type='submit' name='update'  Value='Delete'>";
	  echo "</form>";
	  echo "</td>";
	  }
	  else{
		  
	  echo "<p style='color:black;'>not confirmed</p>";
	   echo "</td>";
	  echo "<td>";
	  echo "<form method='GET' class='btn3'>";
	  echo "<input type='hidden' name='id' value='".$ru['id']."'>";
	  echo "<input type='submit' name='update'  Value='Cancel'>";
	  echo "</form>";
	  echo "</td>";
	 
	  
	  }
	  
	  
	 
	  echo "</tr>";
	  }
	  
	  
  }
  ?>





 <script>
includeHTML();
</script>
</body>
</html>
<?php
	$db = mysqli_connect('localhost', 'root', '', 'room_b_s');
	
	
	$sql="SELECT * FROM request ";
	
	
	
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
<title>Requested rooms</title>


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
$nam=$_GET['name'];
$roo=$_GET['room'];
$tim=$_GET['time'];
$dat=$_GET['date'];



$conn = new mysqli($servername,$username,$password,$dbname);	
$rqu2= "INSERT INTO booked (email,name,room,time,date) VALUES ('$ema','$nam','$roo','$tim','$dat')";
	if($conn->query($rqu2)===TRUE){
		
	} else{
		
	}

$jo=$_GET['id'];
$rqu3= "UPDATE request SET confirm = '1' WHERE request.id = '$jo'";
if($conn->query($rqu3)===TRUE){
		
} else{
		
}
header("Location: arequest.php");
		exit;
}



?>
	
</div>
<table id="customers" align="center">
<tr>

<td colspan="6">
<h2> Requested Rooms</h2>
</td>
</tr>

<tr>
  
    <th>Date</th>
    <th>Time</th>
    <th>Room No.</th>
	<th>Name</th>
	<th>Department</th>
	<th>Accepted</th>
	
	
	
  </tr>
  <?php while($ru=mysqli_fetch_assoc($records))
  {
	  $sql2="SELECT * FROM register where register.email='". $ru['email']. "'";
	
	
	
	$records2=mysqli_query($db,$sql2);
	while($ru2=mysqli_fetch_assoc($records2))
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
	  
	  echo"<td>";
	echo $ru2['name'];
	echo "</td>";
	echo"<td>";
	echo $ru2['dept'];
	echo "</td>";
	echo"<td>";
	  echo "<form method='GET' class='btn3'>";
	  echo "<input type='hidden' name='id' value='".$ru['id']."'>";
	  echo "<input type='hidden' name='email' value='".$ru['email']."'>";
	  echo "<input type='hidden' name='name' value='".$ru['name']."'>";
	  echo "<input type='hidden' name='room' value='".$ru['room']."'>";
	  echo "<input type='hidden' name='time' value='".$ru['time']."'>";
	  echo "<input type='hidden' name='date' value='".$ru['date']."'>";
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
	}  
	  
  }
  ?>





 <script>
includeHTML();
</script>
</body>
</html>
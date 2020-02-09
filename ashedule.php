<?php
	$db = mysqli_connect('localhost', 'root', '', 'room_b_s');
	
	
	$sql="SELECT * FROM shedule";
	
	
	
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
$ema=$_GET['room'];
$nam=$_GET['time'];




$conn = new mysqli($servername,$username,$password,$dbname);	
$rqu2= "INSERT INTO shedule (room,time) VALUES ('$ema','$nam')";
	if($conn->query($rqu2)===TRUE){
		
	} else{
		
	}
	header("Location: ashedule.php");
		exit;


}



?>
<?php
if (isset($_GET['update2'])) {

 $servername="localhost";
$username="root";
$password= "";
$dbname="room_b_s";

$conn = new mysqli($servername,$username,$password,$dbname);
$jo=$_GET['id'];
$rqu3= "DELETE FROM shedule WHERE shedule.id = '$jo'";
if($conn->query($rqu3)===TRUE){
		
} else{
		
}
header("Location: ashedule.php");
		exit;
}



?>
	
</div>
<table id="customers" align="center">
<tr>

<td colspan="3">
<h2>Sheduled Class</h2>
</td>
</tr>

<tr>
  
    <th>Room</th>
    <th>Time</th>
    <th>Insert/Delete</th>
	
	
	
	
  </tr>
  <?php 
  echo "<tr>";
  echo "<td>";
  echo"<form method='Get'  class='btn3'>
	
	<select type='text' name='room' id='sel' align='center'>";
	$sql2="SELECT * FROM room_n";
	
	
	
	$records2=mysqli_query($db,$sql2);
	while($ru2=mysqli_fetch_assoc($records2))
	{
		$kkp=$ru2['room'];
		$d=explode(',',$kkp);
		$ct=count($d);
		for ($i=0;$i<$ct;$i++)
		{
			echo "<option value=".$d[$i].">".$d[$i]."</option>";
		}
	
		
		
	}
	echo "</select>";
	
	
  echo "</td>";
  
  echo "<td>";
  echo "<select type='text' name='time'>";
  echo"<option value='1'>8.30-9.55</option>";
  echo"<option value='2'>10.00-11.25</option>";
  echo"<option value='3'>11.30-12.55</option>";
  echo"<option value='4'>01.00-02.25</option>";
  echo "</select>";
  echo "</td>";
  echo "<td>";
 echo "<input type='submit' name='update' Value='Insert'>";
 echo "</td>";
  echo "</tr>";
  
  echo "</form>";
  while($ru=mysqli_fetch_assoc($records))
  {
	  
		echo "<tr>";
		echo"<td>";
		echo $ru['room'];
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
	  echo "<form method='GET' class='btn3'>";
	  echo "<input type='hidden' name='id' value='".$ru['id']."'>";
	  echo "<input type='submit' name='update2'   Value='Delete'>";
	 
	
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
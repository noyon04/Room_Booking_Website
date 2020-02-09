<?php
	$db = mysqli_connect('localhost', 'root', '', 'room_b_s');
	$ct=$_COOKIE['email'];
	$ids2=explode(' ', $ct);
	
	$sql="SELECT * FROM register where register.email='". $ids2[0]. "'";
	
	
	
	$records=mysqli_query($db,$sql);
	
	
	
?>
<html lang="en">
<head>
<script>

function button(btn,room,time){
		
	  if(btn.style.backgroundColor == "red")
	  {
		 
		 btn.style.background="none";
		 btn.style.border="none";
		 var dk= readCookie('room');
		 var ret = dk.replace(","+room,'');
		 document.cookie="room= "+ret;
		 var dk2= readCookie('time');
		 var ret2 = dk2.replace(","+time,'');
		 document.cookie="time= "+ret2;
	  }
	  else{

		 btn.style.backgroundColor = "red" ;
		 var kk= getCookie("room");
		 
		 var kk2= getCookie("time");
		 
		 var nn= kk.includes(room);
		 var nn2= kk2.includes(time);
		
		 	 
		 document.cookie="room= "+kk+","+room;
		 document.cookie="time= "+kk2+","+time;
		
		 
		 
		 
	  }
	 
	 
}
function rbutton(rbtn,rroom,rtime){
		
	  if(rbtn.style.backgroundColor == "red")
	  {
		 
		 rbtn.style.background="none";
		 rbtn.style.border="none";
		 var rdk= readCookie('rroom');
		 var rret = rdk.replace(","+rroom,'');
		 document.cookie="rroom= "+rret;
		 var rdk2= readCookie('rtime');
		 var rret2 = rdk2.replace(","+rtime,'');
		 document.cookie="rtime= "+rret2;
	  }
	  else{

		 rbtn.style.backgroundColor = "red" ;
		 var rkk= getCookie("rroom");
		 
		 var rkk2= getCookie("rtime");
		 
		 var rnn= rkk.includes(rroom);
		 var rnn2= rkk2.includes(rtime);
		
		 	 
		 document.cookie="rroom= "+rkk+","+rroom;
		 document.cookie="rtime= "+rkk2+","+rtime;
		
		 
		 
		 
	  }
	 
	 
}
function ll(l)
{
	var tm=document.cookie;
	var ol=tm.includes("ch");
	
	if(l==0 && ol== false )
	{
		
		document.cookie="ch=,"+l;
	}
	else if (l==1 && ol== true){
		
		document.cookie="ch=,1,"+l;
		
	}
}
function datec(d)
{
	
	document.cookie="datel=,"+d;
	//alert(document.cookie);
	
	
}
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function del_cookie(name) {
    document.cookie = name + 
    '=; expires=Thu, 01-Jan-05 00:00:01 GMT;';
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function onload(){
	var k= document.cookie;
	
	var r=k.includes("room");
	if(r==false)
		document.cookie="room= ";
	else
	{
		del_cookie("room");
		document.cookie="room= ";
	}
	var r2=k.includes("time");
	if(r2==false)
		document.cookie="time= ";
	else
	{
		del_cookie("time");
		document.cookie="time= ";
	}
	var r3=k.includes("datel");
	if(r3==false)
	{
		document.cookie="datel= ";
	
	}
	var r4=k.includes("ch");
	if(r4==false)
	{
		document.cookie="ch= ";
	}
	var r5=k.includes("dept");
	if(r5==false)
	{
		document.cookie="dept=0";
	
	}
	
	var rr=k.includes("rroom");
	if(rr==false)
		document.cookie="rroom= ";
	else
	{
		del_cookie("rroom");
		document.cookie="rroom= ";
	}
	var rr2=k.includes("rtime");
	if(rr2==false)
		document.cookie="rtime= ";
	else
	{
		del_cookie("rtime");
		document.cookie="rtime= ";
	}
	//else
	//{
	//	del_cookie("datel");
	//	document.cookie="datel= ";
	//}
	
	
	
	
	
	
	
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
<title>My Account</title>


</head>

<body onload="onload()">
<div w3-include-html="hmcss.php"></div>
<div class="sidebar">
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
  <?php include('ccc.php'); 
  date_default_timezone_set('Asia/Dhaka');
  
  $ch=0;
  echo '<script>
	ll("'.$ch.'");
	</script>';
	?>
	
	<form method="Get" id="form" align="center" >
	<label>Date:</label>
	<select type="text" name="date2">
	<?php
	error_reporting(0);
	$startdate = strtotime("Thursday");
			$enddate = strtotime("+5 weeks", $startdate);
	
	while ($startdate < $enddate) {
		 $hh=date('M-d-Y-D', $startdate);
		echo "<option value=".$hh.">".$hh."</option>";
		$startdate = strtotime("+1 week", $startdate);
	}
	?>
	
	
			
	</select>
	
	<input type="submit" name="search" value="Search">	
	</form>
	
		
		
			
	<table id="customers" align="center">
	<tr>
    <td colspan="6"><?php
	if (isset($_GET['search'])) {
	$tr2 = $_GET['date2'];
	echo '<script>
	datec("'.$tr2.'");
	</script>';
	$chp=1;
	echo '<script>
	ll("'.$chp.'");
	</script>';
	

	$dteq=$_COOKIE['datel'];
 
	$dteq2=explode(',',$dteq);
	
	$tr4=$dteq2[0];
	echo "<h2>Date:".$tr2."</h2>";
	}
	else{
	$tr = strtotime("Thursday");
	$tr3=date('M-d-Y-D', $tr);
	
	$jj=$_COOKIE['ch'];
	$jj2=explode(',',$jj);
	//echo $jj2[1];

	
	if($jj2[1]!=1)
	{
		//echo "ok";
		echo "<script>
		datec('".$tr3."');
		</script>";
		
	}
	
	//$tr2=$tr3;
	
	//echo $tr2;
	$dteqq=$_COOKIE['datel'];
 
	$dteqq2=explode(',',$dteqq);
	//echo $dteqq2[1];
	$tr2=$dteqq2[1];
	
	
	//echo "<h2>Date:".$tr2."</h2>";
	echo "<h2>Date:".$tr2."</h2>";
	//setcookie("date", $tr2);
	
	
	
	}
?>	</td>
<?php
if(isset($_GET["update"]))
{
	
 $servername="localhost";
$username="root";
$password= "";
$dbname="room_b_s";
	
	
	
	$conn = new mysqli($servername,$username,$password,$dbname);
 $ro=$_COOKIE['room'];
 $ro2=explode(',', $ro);
 $ct=count($ro2);
 $ti=$_COOKIE['time'];

 $ti2=explode(',',$ti);
 $em=$ids2[0];
 $dte=$_COOKIE['datel'];
 
 $dte2=explode(',',$dte);
 //echo $dte2[1];
 $dte3=$dte2[1];

 
 
 if($ct>0)
 {
	 $sql4="SELECT * FROM register where register.email='". $em. "'";
	
	$records4=mysqli_query($db,$sql4);
	 while($mobile4=mysqli_fetch_assoc($records4))
	 {
		 $nm=$mobile4['name'];
	for($q=1;$q<$ct;$q++)
	{
	 
	//echo $ids2[0],$mobile['name'],$ro2[$q],$ti2[$q],$tr2; 
	$qu2= "INSERT INTO booked (email,name,room,time,date) VALUES ('$em','$nm','$ro2[$q]','$ti2[$q]','$tr2')";
	if($conn->query($qu2)===TRUE){
		
	} else{
		
	}

 }

 }
 }

}

?>

<?php
if(isset($_GET["update2"]))
{
	
 $servername="localhost";
$username="root";
$password= "";
$dbname="room_b_s";
	
	
	
	$conn = new mysqli($servername,$username,$password,$dbname);
 $rro=$_COOKIE['rroom'];
 $rro2=explode(',', $rro);
 $rct=count($rro2);
 $rti=$_COOKIE['rtime'];

 $rti2=explode(',',$rti);
 $rem=$ids2[0];
 $rdte=$_COOKIE['datel'];
 
 $rdte2=explode(',',$rdte);
 //echo $dte2[1];
 $rdte3=$rdte2[1];

 
 
 if($rct>0)
 {
	 $rsql4="SELECT * FROM register where register.email='". $rem. "'";
	
	$rrecords4=mysqli_query($db,$rsql4);
	 while($rmobile4=mysqli_fetch_assoc($rrecords4))
	 {
		 $rnm=$rmobile4['name'];
	for($rq=1;$rq<$rct;$rq++)
	{
	 
	//echo $ids2[0],$mobile['name'],$ro2[$q],$ti2[$q],$tr2; 
	$rqu2= "INSERT INTO request (email,name,room,time,date) VALUES ('$rem','$rnm','$rro2[$rq]','$rti2[$rq]','$tr2')";
	if($conn->query($rqu2)===TRUE){
		
	} else{
		
	}

 }

 }
 }

}

?>
  </tr>	
  <tr>
  
    <th>Room_No.</th>
    <th>8.30-9.55</th>
    <th>10.00-11.25</th>
	<th>11.30-12.55</th>
	<th>01.00-2.25</th>
	<th>Department</th>
	
  </tr>
 <?php	
	
	
	
	$countt=0;
	
	while($mobile=mysqli_fetch_assoc($records))
	{ 
	if (isset($_GET['search3'])) {
	$dept2=$_GET['dept'];
	$sql2="SELECT room from room_n where room_n.dept='".$dept2."'";
	
	
	$records2=mysqli_query($db,$sql2);
	
	while($mobile2=mysqli_fetch_assoc($records2))
	{
		
	$ids=explode(',', $mobile2 ['room']);
	$nn=count($ids);
	
	$sql3="SELECT*FROM booked where booked.date='".$tr2."'";
	
	
	$dpt=$_COOKIE['dept'];
	$dpt2=explode(' ', $dpt);
	
	
	$records3=mysqli_query($db,$sql3);
	
	
	for($i=0;$i<$nn;$i++)
	{
		echo "<tr>";
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				echo "<td>";
				echo $ids[$i];
				echo "</td>";
				continue;
			}
			else if($j==5)
			{
				echo "<td>";
				echo $dept2;
				echo "</td>";
				continue;
			}
			
			echo "<td>";
			echo "<button id='button".$i,$j."'; class='buttonn';  onclick='rbutton(this,".$ids[$i].",".$j.")'; style='background-color: transparent'>Available</button>";
			echo "</td>";
			
		
		}
		echo "</tr>";	 
	}
	
	while($mobile3=mysqli_fetch_assoc($records3))
	{	
	for($i=0;$i<$nn;$i++)
	{	
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				continue;
			}
			else if($j==5)
			{
				
				continue;
			}
			else if($tr2==$mobile3['date'])
			{
			
				
				
				if($ids[$i]==$mobile3['room'])
				{
					
					if($j==$mobile3['time'])
						
					{
						
					echo '<script type="text/javascript">
					
					var h=document.getElementById("button'.$i,$j.'").innerText="booked by '.$mobile3["name"].'";
					var k=document.getElementById("button'.$i,$j.'").setAttribute("onclick","kk();");
					var f=document.getElementById("button'.$i,$j.'").setAttribute("style","color:red;");
					</script>';	
						
						$countt++;
						continue;
					}
				}
			
			}
		
		
			
		
		}
		
		
		
		
		//echo "</tr>";
		
		 
	}
	//echo $mobile3['id'];
	
	
	}
	$sql5="SELECT*FROM request where request.date='".$tr2."'";
	$records5=mysqli_query($db,$sql5);
	while($mobile5=mysqli_fetch_assoc($records5))
	{	
	for($i=0;$i<$nn;$i++)
	{	
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				continue;
			}
			else if($j==5)
			{
				
				continue;
			}
			else if($tr2==$mobile5['date'])
			{
			
				
				
				if($ids[$i]==$mobile5['room'])
				{
					
					if($j==$mobile5['time'])
						
					{
						
					echo '<script type="text/javascript">
					
					var h=document.getElementById("button'.$i,$j.'").innerText="requested by '.$mobile5["name"].'";
					var k=document.getElementById("button'.$i,$j.'").setAttribute("onclick","kk();");
					var f=document.getElementById("button'.$i,$j.'").setAttribute("style","color:red;");
					</script>';	
						
						$countt++;
						continue;
					}
				}
			
			}
		
		
			
		
		}
		
		
		
		
		//echo "</tr>";
		
		 
	}
	//echo $mobile3['id'];
	
	
	}

	$sql6="SELECT*FROM shedule";
	$records6=mysqli_query($db,$sql6);
	while($mobile6=mysqli_fetch_assoc($records6))
	{	
	for($i=0;$i<$nn;$i++)
	{	
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				continue;
			}
			else if($j==5)
			{
				
				continue;
			}
			
			
			
				
				
				else if($ids[$i]==$mobile5['room'])
				{
					
					if($j==$mobile5['time'])
						
					{
						
					echo '<script type="text/javascript">
					
					var h=document.getElementById("button'.$i,$j.'").innerText="Sheduled Class";
					var k=document.getElementById("button'.$i,$j.'").setAttribute("onclick","kk();");
					var f=document.getElementById("button'.$i,$j.'").setAttribute("style","color:red;");
					</script>';	
						
						$countt++;
						continue;
					}
				}
			
			
		
		
			
		
		}
		
		
		
		
		//echo "</tr>";
		
		 
	}
	//echo $mobile3['id'];
	
	
	}	
	}

	
	$ak=$nn*4;
	if($countt==$ak)
	{
		
		echo"<tr>";
		echo "<td colspan='6'>";
		echo "<form method='GET' class='btn'>";
		echo "<select type='text' name='dept'>";
		echo "<option value='cse'>cse</option>";
		echo "<option value='bba'>bba</option>";
		echo "<option value='eng'>eng</option>";
		echo "<option value='llb'>llb</option>";
		echo "<input type='submit' name='search3'  Value='Search'>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
		
	}
	else{
		echo"<tr>";
		echo "<td colspan='6'>";
		echo "<form method='GET' class='btn'>";
		echo "<input type='submit' name='update2'  Value='Update'>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
	}
	
	
	
	
	
	
	}
	
	else {
		$sql2="SELECT room from room_n where room_n.dept='".$mobile['dept']."'";
	
	
	
	$records2=mysqli_query($db,$sql2);
	
	while($mobile2=mysqli_fetch_assoc($records2))
	{
		
	$ids=explode(',', $mobile2 ['room']);
	$nn=count($ids);
	
	$sql3="SELECT*FROM booked where booked.date='".$tr2."'";
	
	
	$dpt=$_COOKIE['dept'];
	$dpt2=explode(' ', $dpt);
	
	
	$records3=mysqli_query($db,$sql3);
	
	
	for($i=0;$i<$nn;$i++)
	{
		echo "<tr>";
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				echo "<td>";
				echo $ids[$i];
				echo "</td>";
				continue;
			}
			else if($j==5)
			{
				echo "<td>";
				echo $mobile['dept'];
				echo "</td>";
				continue;
			}
			
			echo "<td>";
			echo "<button id='button".$i,$j."'; class='buttonn';  onclick='button(this,".$ids[$i].",".$j.")'; style='background-color: transparent'>Available</button>";
			echo "</td>";
			
		
		}
		echo "</tr>";	 
	}
	
	while($mobile3=mysqli_fetch_assoc($records3))
	{	
	for($i=0;$i<$nn;$i++)
	{	
		for ($j=0;$j<5;$j++)
		{
			if($j==0)
			{
				continue;
			}
			else if($j==5)
			{
				
				continue;
			}
			
			else if($tr2==$mobile3['date'])
			{
			
				
				
				if($ids[$i]==$mobile3['room'])
				{
					
					if($j==$mobile3['time'])
						
					{
						
					echo '<script type="text/javascript">
					
					var h=document.getElementById("button'.$i,$j.'").innerText="booked by '.$mobile3["name"].'";
					var k=document.getElementById("button'.$i,$j.'").setAttribute("onclick","kk();");
					var f=document.getElementById("button'.$i,$j.'").setAttribute("style","color:red;");
					</script>';	
						
						$countt++;
						continue;
					}
				}
			
			}
		
		
			
		
		}
		
		
		
		
		//echo "</tr>";
		
		 
	}
	//echo $mobile3['id'];
	
	
	}
	$sql5="SELECT*FROM request where request.date='".$tr2."'";
	$records5=mysqli_query($db,$sql5);
	while($mobile5=mysqli_fetch_assoc($records5))
	{	
	for($i=0;$i<$nn;$i++)
	{	
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				continue;
			}
			else if($j==5)
			{
				
				continue;
			}
			else if($tr2==$mobile5['date'])
			{
			
				
				
				if($ids[$i]==$mobile5['room'])
				{
					
					if($j==$mobile5['time'])
						
					{
						
					echo '<script type="text/javascript">
					
					var h=document.getElementById("button'.$i,$j.'").innerText="requested by '.$mobile5["name"].'";
					var k=document.getElementById("button'.$i,$j.'").setAttribute("onclick","kk();");
					var f=document.getElementById("button'.$i,$j.'").setAttribute("style","color:red;");
					</script>';	
						
						$countt++;
						continue;
					}
				}
			
			}
		
		
			
		
		}
		
		
		
		
		//echo "</tr>";
		
		 
	}
	//echo $mobile3['id'];
	
	
	}

	$sql6="SELECT*FROM shedule";
	$records6=mysqli_query($db,$sql6);
	while($mobile6=mysqli_fetch_assoc($records6))
	{	
	for($i=0;$i<$nn;$i++)
	{	
		for ($j=0;$j<6;$j++)
		{
			if($j==0)
			{
				continue;
			}
			else if($j==5)
			{
				
				continue;
			}
			
			
			
				
				
				else if($ids[$i]==$mobile6['room'])
				{
					
					if($j==$mobile6['time'])
						
					{
						
					echo '<script type="text/javascript">
					
					var h=document.getElementById("button'.$i,$j.'").innerText="Sheduled Class";
					var k=document.getElementById("button'.$i,$j.'").setAttribute("onclick","kk();");
					var f=document.getElementById("button'.$i,$j.'").setAttribute("style","color:red;");
					</script>';	
						
						$countt++;
						continue;
					}
				}
			
			
		
		
			
		
		}
		
		
		
		
		//echo "</tr>";
		
		 
	}
	//echo $mobile3['id'];
	
	
	}	
		
	}

	
	$ak=$nn*4;
	if($countt==$ak)
	{
		
		echo"<tr>";
		echo "<td colspan='6'>";
		echo "<form method='GET' class='btn'>";
		echo "<select type='text' name='dept'>";
		echo "<option value='cse'>cse</option>";
		echo "<option value='bba'>bba</option>";
		echo "<option value='eng'>eng</option>";
		echo "<option value='llb'>llb</option>";
		echo "<input type='submit' name='search3'  Value='Search'>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
		
	}
	else{
		echo"<tr>";
		echo "<td colspan='6'>";
		echo "<form method='GET' class='btn'>";
		echo "<input type='submit' name='update'  Value='Update'>";
		echo "</form>";
		echo "</td>";
		echo "</tr>";
	}
	}
	}
?> 
</table>
	
</div>



 <script>
includeHTML();
</script>
</body>
</html>
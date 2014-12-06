<?php
include '../includes.php';

?>
<?php
include('../log/session.php');
if($login_type != "admin" && $login_type != "employee"){
mysql_close($conn); // Closing Connection
header('Location: ../index.php?message='.$login_session); // Redirecting To Home Page
}
?>
<html>
<title>K_Traders</title>
<head>
 <link rel="stylesheet" type="text/css" href="../CSS/form.css">
<link href="../CSS/login.css" rel="stylesheet" type="text/css">
<link href="../CSS/navbar.css" rel="stylesheet" type="text/css">


</head>
<script>
function view_tb()
{
	var q = document.getElementById('query').value;	
	var xmlhttp;
  	xmlhttp=new XMLHttpRequest();  
	xmlhttp.onreadystatechange=function()
  	{
	  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("display").innerHTML=xmlhttp.responseText;
	    }
  	}
xmlhttp.open("GET","view.php?in="+q,true);
xmlhttp.send();

}
function update()
{
	var item = document.getElementById('query').value;
	var q = document.getElementById('sel').value;
	var up = document.getElementById('upd_in').value;
	var xmlhttp;
  xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update.php?in="+q+"&up="+up+"&item="+item,true);
xmlhttp.send();
}

function updates()
{	

	var item = document.getElementById('query').value;
	
	
	
	var q1 = document.getElementById('name').value;
	var q2 = document.getElementById('sex').value;
	var q3 = document.getElementById('age').value;
	var q4 = document.getElementById('emp_join_date').value;
	var q5 = document.getElementById('email').value;
	var q6 = document.getElementById('address').value;
	var q7 = document.getElementById('emp_dues').value;
	var q8 = document.getElementById('emp_attendance').value;
	var q9 = document.getElementById('emp_task').value;

	var xmlhttp;
	xmlhttp=new XMLHttpRequest();  
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update.php?in1="+q1+"&in2="+q2+"&in3="+q3+"&in4="+q4+"&in5="+q5+"&in6="+q6+"&in7="+q7+"&in8="+q8+"&in9="+q9+
	"&up1="+"emp_name"+"&up2="+"sex"+"&up3="+"age"+"&up4="+"emp_join_date"+"&up5="+"email"+"&up6="+"emp_address"+"&up7="+"emp_dues"+"&up8="+"emp_attendance"+"&up9="+"emp_task"+"&item="+item,true);
xmlhttp.send();
}

function delete_item()
{
	var item = document.getElementById('query').value;
	  xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","delete.php?del="+item,true);
xmlhttp.send();
}

<?php
	if($login_type == "employee"){

	

?>

view_tb()
<?php } ?>

</script>
<body>
<?php include '../home/topbar.php'; ?>
<?php
if($login_type == "admin") 
 include '../home/navbar_admin.php';
else
	include '../home/navbar_employee.php';
  
if($login_type == "admin"){
?>	
	<input placeholder="Enter Employee Username" id="query">
	<br>
	
		
			
<?php
}
?>

<button onclick="view_tb()">view employee</button>

<?php if($login_type == "employee"){?>

<span id='query'></span>

<span id='name'></span>
<span id='emp_join_date'></span>
<span id='emp_dues'></span>
<span id='emp_attendance'></span>
<span id='emp_task'></span>

<?php }?>



	<div id="display" > 

	</div>
</body>
</html>


	

<?php
include '../includes.php';

?>
<?php
include('../log/session.php');
if($login_type != "admin" && $login_type != "customer"){
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


function updates()
{	

	var item = document.getElementById('query').value;
	
	
	
	var q1 = document.getElementById('name').value;
	var q2 = document.getElementById('sex').value;
	var q3 = document.getElementById('age').value;
	var q4 = document.getElementById('email').value;
	var q5 = document.getElementById('address').value;
	var q6 = document.getElementById('dues').value;
		

	var xmlhttp;
	xmlhttp=new XMLHttpRequest();  
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update.php?in1="+q1+"&in2="+q2+"&in3="+q3+"&in4="+q4+"&in5="+q5+"&in6="+q6+
	"&up1="+"fullname"+"&up2="+"sex"+"&up3="+"age"+"&up4="+"email"+"&up5="+"address"+"&up6="+"dues"+"&item="+item,true);
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



</script>
<body>
<?php include '../home/topbar.php'; ?>
<?php
if($login_type == "admin") 
 include '../home/navbar_admin.php';
else
	include '../home/navbar_customer.php';
  
if($login_type == "admin"){
?>	
	<input placeholder="Enter Customer Username" id="query">
	<br>
	
		
			
<?php
}
?>

<button onclick="view_tb()">view customer</button>

<?php if($login_type == "customer"){?>

<span id='query'></span>

<span id='name'></span>
<span id='dues'></span>


<?php }?>



	<div id="display" > 

	</div>
</body>
</html>


	

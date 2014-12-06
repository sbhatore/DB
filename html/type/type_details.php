<?php
include '../includes.php';

?>
<?php
include('../log/session.php');
if($login_type != "admin"){
mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
<html>
<title>K_Traders</title>
<head>
 <link rel="stylesheet" type="text/css" href="atable.css">
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


function reflect()
{
	var q = document.getElementById('sel').value;
	var z = document.getElementById('upd_in');
	if(q == 'emp_name')
	{
		z.placeholder = 'name to be updated';
	}
	else if(q == 'emp_address')
	{
		z.placeholder = "Address to be updated";
	}		
	else if(q == 'emp_type')
	{
		z.placeholder = "Task to be updated";
	}
	else if(q == 'emp_dues')
	{
		z.placeholder = "Dues to be updated";
	}	
	else
	{
		z.placeholder = "Attendance to be updated";
	}
}


function delete_item()
{
	var item = document.getElementById('name').value;
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
<?php include '../home/navbar_admin.php'; ?>

	<table border="1">
	  <tr>
	    <td align="center">Form Input Employees Data</td>
	  </tr>
	  <tr>
	    <td>
	      <table>
	        <form method="post" action="type.php">
	        <tr>
	          <td>User Name</td>
	          <td><input id="name" placeholder="search by name" type="text" name="name" size="20">
	          </td>
	        </tr>
	        
		<td>Type</td>
		<td><select name="type">
			<option value="admin">admin</option>
			<option value="customer">customer</option>
			<option value="employee">employee</option>
		</select>
		</td>
		</tr>

		<tr>
		<td></td>
	          <td align="right"><input type="submit"
	          name="submit" value="Update"></td>
	        </tr>
	    </form>
	        
	<div id="display"> </div>
</body>
</html>


	

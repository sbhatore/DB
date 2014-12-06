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
<head>
 <link rel="stylesheet" type="text/css" href="atable.css">
<link href="../CSS/login.css" rel="stylesheet" type="text/css">
<link href="../CSS/navbar.css" rel="stylesheet" type="text/css">

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
	if(q == 'company_name')
	{
		z.placeholder = 'Company Name to be updated';
	}
	else if(q == 'address')
	{
		z.placeholder = "Address to be updated";
	}		
	else if(q == 'contact')
	{
		z.placeholder = "Contact to be updated";
	}	
	else
	{
		z.placeholder = "Dues to be updated";
	}
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

</head>
<title>K_Traders</title>
	<?php
	if(isset($_GET['message'])){
    echo $_GET['message'];
}
?>
<body>
<?php include '../home/topbar.php'; ?>
<?php include '../home/navbar_admin.php'; ?>

	<table align='center' border="1">
	  <tr>
	    <td align="center">Add Distributor</td>
	  </tr>
	  <tr>
	    <td>
	      <table>
	        <form method="post" action="distributor.php">
	        <tr>
	          <td>Company Name</td>
	          <td><input type="text" name="cn" size="20">
	          </td>
	        </tr>
	        <tr>
		<td>Address</td>
		<td><input type="text" name="add" size="40">
		</td>
		</tr>
		<tr>
		<td>Contact</td>
		<td><input type="number" name="contact" size="20">
		</td>
		</tr>

		<tr>
		<td>Dues</td>
		<td><input type="number" name="dues" size="20">
		</td>
		</tr>
		<tr>
		<td></td>
	          <td align="right"><input type="submit"
	          name="submit" value="Add"></td>
	        </tr>
	    </form>
	        </table>
	      </td>
	    </tr>
	</table>
<br><br>
	<input placeholder="query"  id="query">
	<table aligsn="center" border="1px">
	<tr>
		<td><button onclick="view_tb()">view distributor</button></td>
			<td id="upd"><br>
			 <select id="sel" onclick="reflect()">
				  <option value="company_name">Company Name</option>
				  <option value="address">Address</option>
				  <option value="contact">Contact</option>
				  <option value="dues">Dues</option>
			</select> 
			<input id="upd_in"></input>
			<br>
			<button  onclick="update()">update Distributor</button>
		</td>

		<td><button onclick="delete_item()">Delete Distributor</button></td>
	</tr>
</table>
	<div id="display"> </div>
</body>

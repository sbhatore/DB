<?php
include 'includes.php';
?>

<?php
include ('../log/session.php');
include '../home/topbar.php';
if($login_type == "admin")
		include '../home/navbar_admin.php';
	else
		include '../home/navbar_employee.php';

if($login_type != "admin" && $login_type != "employee"){
	mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
<head>
 
<link href="../CSS/login.css" rel="stylesheet" type="text/css">
<link href="../CSS/navbar.css" rel="stylesheet" type="text/css">
<title>K_Traders</title>

<head>
 <link rel="stylesheet" type="text/css" href="atable.css">
</head>
	<body>
		<font  color="red"> <?php
	if(isset($_GET['message'])){
    echo $_GET['message'];
}?>

	<table border="1">
	  <tr>
	    <td align="center">Form Input Employees Data</td>
	  </tr>
	  <tr>
	    <td>
	      <table>
	        <form method="post" action="stock.php">
	        <tr>
	          <td>Product id</td>
	          <td><input type="text" name="prod_id" size="20">
	          </td>
	        </tr>
	        <tr>
		<td>Quantity Left</td>
		<td><input type="text" name="qty_left" size="40">
		</td>
		</tr>
		<tr>
		<td></td>
	          <td align="right"><input type="submit"
	          name="submit" value="Update"></td>
	        </tr>
	        </table>
	      </td>
	    </tr>
	</table>
</body>
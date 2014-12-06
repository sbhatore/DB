<?php
include('../log/session.php');
if($login_type != "customer"){
mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
<head>
<title>K_Traders</title>
<link href="../CSS/login.css" rel="stylesheet" type="text/css">
<link href="../CSS/navbar.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'topbar.php'; ?>
<?php include 'navbar_customer.php'; ?>
</body>
</html>
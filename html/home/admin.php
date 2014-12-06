
<?php
include('../log/session.php');
if($login_type != "admin"){
mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>
<head>

<title>K_Traders</title>
<link href="http://localhost/CSS/login.css" rel="stylesheet" type="text/css">
<link href="http://localhost/CSS/navbar.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php if(isset($_GET['message'])){
echo($_GET['message']);
$_GET['message']=NULL;
}

?>

	
<?php include 'topbar.php'; ?>
<?php include 'navbar_admin.php'; ?>
</body>
</html>

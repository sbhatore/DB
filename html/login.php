<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$user=$_POST['username'];
$pass=$_POST['password'];
echo "aaaaaaaaaaa";

// To protect MySQL injection for Security purpose
$user = stripslashes($user);
$pass = stripslashes($pass);

//encrypt
$pass = md5($pass);



// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include('includes.php');
// Selecting Database

// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($conn, "select * from company where password='$pass' AND username='$user'") or die(mysql_error());
//var_dump($query);
$x = $query->fetch_assoc();

//echo $x['password'];
//$rows = mysql_num_rows($);
//echo $rows;
if ($x) {
	
$_SESSION['login_user']=$x['username']; // Initializing Session
$_SESSION['type'] = $x['type'];

if($x['type'] == "admin")
header("Location: home/admin.php");
else if($x['type'] == "customer")
header("Location: home/customer.php");
else if($x['type'] == "accountant")
header("Location: ../home/accountant.php");
else if($x['type'] == "employee")
header("Location: home/employee.php");

$error = "Username or Password is invalid";

}
mysqli_close($conn); // Closing Connection
}
}
?>

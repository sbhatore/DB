


<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include '../includes.php';

// Selecting Database
$db = mysqli_select_db($conn, "K_Traders");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
//echo $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select * from company where username='$user_check'");
$row = $ses_sql->fetch_assoc();
//var_dump($row);
$login_session =$row['username'];
$login_type = $row['type'];
//var_dump($login_session);
if(!isset($login_session)){
mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>


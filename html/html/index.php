<?php
include('login.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>K_Traders</title>
<link href="/var/www/html/CSS/login.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="top"><a href="sign_up.php">register</a></div>
<div id="main">
<h1>Khandelwal Traders</h1>
<div id="login">
<h2>Login Form</h2>
<form action="lo" method="post"  accept-charset="UTF-8">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>

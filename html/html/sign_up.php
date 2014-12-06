<?php
include './log/register.php';
?>
<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" type="text/css" href="CSS/register.css">
<title>Sign-Up</title>
</head>
<body id="body-color">
<div id="top"><a href="index.php">login</a></div>
<div id="Sign-Up">
<fieldset style="width:30%"><h2>Registration Form</h2>
<table>
<tr>
<form method="POST" action="log/register.php">
<td>Name</td><td> <input type="text" name="name"></td>
</tr>
<tr>
<td>Email</td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>UserName</td><td> <input type="text" name="user"></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass"></td>
</tr>
<tr>
<td>Confirm Password </td><td><input type="password" name="cpass"></td>
</tr>
<tr>
<td><input id="button" type="submit" name="submit" value="Register"></td>
</tr>
</form>
</table>
</fieldset>
</div>
</body>
</html>

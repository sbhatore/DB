<?php

function SignUp()
{
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	include '../includes.php';
	$pass = md5($_POST['pass']);
	$user = $_POST['user'];
	
	$query = mysqli_query($conn, "SELECT * FROM company WHERE username = '$user'") or die(mysql_error());
	//var_dump($query);
	$row = $query->fetch_assoc();
	//var_dump($row);
	if(!$row)
	{
		$fullname = $_POST['name'];
		$user = $_POST['user'];
		$email = $_POST['email'];
		$pass =  $_POST['pass'];
		$pass = md5($pass);
		

		$query = "INSERT INTO company (fullname,username,email,password)
		 VALUES ('$fullname','$user','$email','$pass')";
		if ($conn->query($query) === TRUE) {
			echo "New record created successfully";
			
			header("Location: ../index.php"); // Redirecting To Other Page

		} else {

			echo "Error: " . $query . "<br>" . $conn->error;
		}

		mysql_close($conn);
	}
	else
	{
		echo "SORRY...USERNAME ALREADY EXISTS...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>



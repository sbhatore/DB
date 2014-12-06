<?php
include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS company( '.
		'user_id INT NOT NULL AUTO_INCREMENT, '.
		'fullname VARCHAR(40) NOT NULL, '.
		'email VARCHAR(40) NOT NULL, '.
		'username VARCHAR(40) NOT NULL, '.
		'password  VARCHAR(40) NOT NULL, '.
		'type VARCHAR(40) NOT NULL, '.
		'primary key ( user_id ))';

$retval = mysqli_query( $conn, $sql );

$name = "admin";
$pass = "iiit123";
$fullname = "K_traders";
$email = "sbhatore95@gmail.com";
$pass = md5($pass);
$type = "admin";
$sql = "INSERT INTO company (username, password, email, fullname, type)
VALUES ('$name', '$pass', '$email', '$fullname', '$type')";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
?> 








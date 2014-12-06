
<?php

include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS customer( '.
		'cust_id INT NOT NULL AUTO_INCREMENT, '.
		'cust_name VARCHAR(20) NOT NULL, '.
		'cust_address  VARCHAR(20) NOT NULL, '.
		'cust_contact   INT NOT NULL, '.
		'cust_dues    INT NOT NULL, '.
		'primary key ( cust_id ))';

$retval = mysqli_query( $conn, $sql );


$name = $_POST['name'];
$add = $_POST['add'];
$con = $_POST['contact'];
$dues = $_POST['dues'];

$sql = "INSERT INTO customer (cust_name, cust_address, cust_contact, cust_dues)
VALUES ('$name', '$add', '$con', $dues )";

if ($conn->query($sql) === TRUE) {
	    $m = "New record created successfully";
} else {
	    $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
//$message = $m;
$message = urlencode($m);
$newURL = '"order.php?message=".$message';
header("Location: order.php?message=".$message);
die;
?> 

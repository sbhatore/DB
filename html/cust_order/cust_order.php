
<?php
include 'includes.php';
include '../log/session.php';

$sql = 'CREATE TABLE IF NOT EXISTS cust_order( '.
		'order_id INT NOT NULL AUTO_INCREMENT, '.
		'cust_id VARCHAR(20) NOT NULL, '.
		'order_time  VARCHAR(20) NOT NULL, '.
		'delievery_status   VARCHAR(20), '.
		'bill   INT NOT NULL, '.
		'primary key ( order_id ))';

$retval = mysqli_query( $conn, $sql );

$cid = $_SESSION['login_user'];
$time = date("d/m/y  h:i:sa");

$sql = "INSERT INTO cust_order( cust_id, order_time, delievery_status)
VALUES ('$cid', '$time', 'NO' )";


if ($conn->query($sql) === TRUE) {
	    $m = "New record created successfully";
} else {
	    $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
//$message = $m;
/*$message = urlencode($m);
$newURL = '"order.php?message=".$message';
header("Location: order.php?message=".$message);
die;*/
mysql_close($conn);
?> 

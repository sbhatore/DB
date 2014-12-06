
<?php
include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS shop_order( '.
		'order_id INT NOT NULL AUTO_INCREMENT, '.
		'distributor_name VARCHAR(20) NOT NULL, '.
		'order_time  VARCHAR(20) NOT NULL, '.
		'delivery_time  VARCHAR(20) NOT NULL, '.
		'delivery_status   VARCHAR(20), '.
		'bill   INT NOT NULL, '.
		'primary key ( order_id ))';

$retval = mysqli_query( $conn, $sql );

$cid = $_POST['cid'];
$time = date("d/m/y  h:i:sa");

$sql = "INSERT INTO shop_order( distributor_name, order_time,delivery_time, delivery_status)
VALUES ('$cid', '$time','Not Delivered yet', 'NO' )";


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
mysql_close($conn);
?> 

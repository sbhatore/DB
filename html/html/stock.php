<?php
include 'includes.php';

/*$sql = 'CREATE TABLE  stock( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'prod_id VARCHAR(10) NOT NULL, '.
		'qty_left VARCHAR(10) NOT NULL, '.
		'primary key ( prod_id ))';

*/
$sql = 'CREATE TABLE IF NOT EXISTS stock( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'prod_id VARCHAR(20) NOT NULL, '.
		'qty_left  VARCHAR(20) NOT NULL, '.
		'primary key ( id ))';
$retval = mysqli_query( $conn, $sql );

if(!$retval)
{
	echo "fuck";
}


$prod = $_POST['prod_id'];
$qty = $_POST['qty_left'];

$sqli = "INSERT INTO stock (prod_id, qty_left)
VALUES ('$prod', '$qty' )";


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

<?php
include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS shop_items( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'order_id INT NOT NULL , '.		
		'quantity VARCHAR(20), '.
		'item   VARCHAR(40), '.
		'FOREIGN KEY (order_id) REFERENCES shop_order(order_id), '.
		'primary key ( id ))';

$retval = mysqli_query( $conn, $sql );

$o = "SELECT * FROM shop_order WHERE order_id=(SELECT MAX(order_id) FROM shop_order)";

$ret = mysqli_query( $conn, $o );

$row=$ret->fetch_assoc();
//var_dump($row);
$order_id =  $row['order_id'] + 1 ;

$secret = $_POST["secret"];
for($i=1 ; $i<=$secret ; $i++)
{
	$x = 'q'.$i;
	$y = 'i'.$i;	

$items = $_POST[$y];
$qty = $_POST[$x];
echo $qty;

$sql = "INSERT INTO shop_items( order_id, quantity, item)
VALUES ('$order_id', '$qty', '$items' )";


if ($conn->query($sql) === TRUE) {
	  echo   $m = "New record created successfully";
} else {
	    echo $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
//$message = $m;
/*$message = urlencode($m);
$newURL = '"order.php?message=".$message';
header("Location: order.php?message=".$message);
die;*/
}
//echo $secret;
/*


if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
mysql_close($conn);
?> 
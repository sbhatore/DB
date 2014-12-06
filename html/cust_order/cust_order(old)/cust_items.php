
<?php
include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS cust_items( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'order_id INT NOT NULL , '.		
		'quantity VARCHAR(20), '.
		'item   VARCHAR(20), '.
		'FOREIGN KEY (order_id) REFERENCES cust_order(order_id), '.
		'primary key ( id ))';

$retval = mysqli_query( $conn, $sql );

$o = "SELECT * FROM cust_order WHERE order_id=(SELECT MAX(order_id) FROM cust_order)";

$ret = mysqli_query( $conn, $o );

$row=$ret->fetch_assoc();
//var_dump($row);
$order_id =  $row['order_id']  ;

$secret = $_POST["secret"];
$p = 0;
for($i=1 ; $i<=$secret ; $i++)
{
	$x = 'q'.$i;
	$y = 'i'.$i;	


$items = $_POST[$y];
$qty = $_POST[$x];
//echo $qty;

$sql = "INSERT INTO cust_items( order_id, quantity, item)
VALUES ('$order_id', '$qty', '$items' )";
$ret = mysqli_query( $conn, $sql );

$o = "SELECT * FROM groc_list WHERE prod_name='{$items}'";
$ret1 = mysqli_query( $conn, $o );
$price_groc_list=$ret1->fetch_assoc();

$o = "SELECT prod_id FROM groc_list WHERE prod_name='{$items}'";
$ret1 = mysqli_query( $conn, $o );
$row=$ret1->fetch_assoc();
$id = $row['prod_id'];

$o = "SELECT qty_left FROM stock WHERE prod_id='{$id}'";
$ret1 = mysqli_query( $conn, $o );
$row=$ret1->fetch_assoc();
$stock_qty = $row['qty_left'];
$stock_qty = $stock_qty - $qty;
//var_dump($stock_qty);
if($stock_qty > 0)
{
	$p = $p + $price_groc_list['price'] * $qty;
	$q = "UPDATE  stock SET qty_left= '{$stock_qty}' WHERE prod_id = '{$id}' ";
	$ret = mysqli_query($conn , $q);

	if ($conn->query($sql) === TRUE) {
	echo   $m = "New record created successfully";
	} else {
	echo $m =  "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "UPDATE  cust_order SET bill= '{$p}' WHERE order_id = '{$order_id}' ";
	$d = mysqli_query( $conn, $sql );
}
mysql_close($conn);

}
$p = "Your order is been placed and your BILL is Rs ".$p;
$message = urlencode($p);
$newURL = '"order.php?message=".$message';
header("Location: http://localhost/cust_order/order.php?message=".$message);
die;
mysql_close($conn);
?> 
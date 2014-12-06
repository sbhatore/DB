
<?php
include 'includes.php';
include '../log/session.php';

$sql = 'CREATE TABLE IF NOT EXISTS cust_items( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'order_id INT NOT NULL , '.		
		'quantity VARCHAR(20), '.
		'item   VARCHAR(40), '.
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
//echo $items;
$qty = $_POST[$x];
//echo $qty;

$sql = "INSERT INTO cust_items( order_id, quantity, item)
VALUES ('$order_id', '$qty', '$items' )";

$o = "SELECT * FROM groc_list WHERE prod_name='{$items}'";
$ret1 = mysqli_query( $conn, $o );
$row=$ret1->fetch_assoc();
$p = $p + $row['price'] * $qty;


if ($conn->query($sql) === TRUE) {
	     $m = "New record created successfully";
} else {
	    echo $m =  "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE  cust_order SET bill= '{$p}' WHERE order_id = '{$order_id}' ";
$d = mysqli_query( $conn, $sql );
//var_dump($d);


$pay = $_POST['pay'];
$usr=$_SESSION['login_user'];
if($pay == "credit")
{	
	$o = "SELECT dues FROM customer WHERE username='{$usr}'";
	$ret1 = mysqli_query( $conn, $o );
	$r = $ret1->fetch_assoc();
	$d = $r['dues'];
	$d = $p + $d;
	//var_dump($p);
	$q = "UPDATE customer SET dues= '{$d}' WHERE username ='{$usr}'" ;
 	//var_dump($q);
 	$d = mysqli_query( $conn, $q ); 		
}
mysql_close($conn);

}
if($pay == "credit")
{	

	$p = "Your order is been placed and your BILL is Rs ".$p."and is added in your dues";
}
else
{
	$p = "Your order is been placed and your BILL is Rs ".$p;	
}
$message = urlencode($p);
$newURL = '"order.php?message=".$message';
header("Location: order.php?message=".$message);
die;
mysql_close($conn);
?> 
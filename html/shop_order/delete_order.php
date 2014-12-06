<?php
include 'includes.php';
?>

<?php
$x = $_GET['in'];

$q = "DELETE FROM shop_items
WHERE order_id = ".$x;

$ret = mysqli_query( $conn, $q );

$q = "DELETE FROM shop_order
WHERE order_id = ".$x;

$ret = mysqli_query( $conn, $q );

if($ret)
{
	$m =  "deleted";
}
else
{
	$m = "failed";
}

$message = urlencode($m);
$newURL = '"order.php?message=".$message';
header("Location: cust_order_view.php?message=".$message);
die;
?>
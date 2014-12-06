<?php
include 'includes.php';

$x = $_GET['del'];
$q = "DELETE FROM shop_order
WHERE order_id = '{$x}'";

$ret = mysqli_query( $conn, $q );

if($ret)
{
echo	$m =  "deleted";
}
else
{
echo	$m = "failed";	
}

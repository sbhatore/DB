<?php
include 'includes.php';
?>

<?php
$x = $_GET['in'];
$val = $_GET['val'];
echo $val;
$x = substr($x,2);
echo $x;



$q = "UPDATE  cust_order SET delievery_status= '{$val}' WHERE order_id = '{$x}' ";

$ret = mysqli_query( $conn, $q );

if($ret)
{
	$m =  "updated";
}
else
{
	$m = "asfsaf";
}
echo $m;
<?php
include 'includes.php';

$x = $_GET['in'];
$y = $_GET['up'];
$item = $_GET['item'];
//echo $x;
$o = "UPDATE  distributor SET {$x}= '{$y}' WHERE company_name = '{$item}' ";

$ret = mysqli_query( $conn, $o );
if($ret)
{
	echo "updated";
}
else
{
	echo "failed";
}

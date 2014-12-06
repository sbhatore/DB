<?php
include 'includes.php';

$x = $_GET['in'];
$y = $_GET['up'];
$item = $_GET['item'];
//echo $x;
$o = "UPDATE  groc_list SET {$x}= '{$y}' WHERE prod_id = '{$item}' ";

$ret = mysqli_query( $conn, $o );
if($ret)
{
	echo "updated";
}
else
{
	echo "failed";
}

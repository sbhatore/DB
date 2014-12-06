<?php
include 'includes.php';

$x = $_GET['in'];
$y = $_GET['up'];
$item = $_GET['item'];
//echo $x;
$o = "UPDATE  employee SET {$x}= '{$y}' WHERE emp_name = '{$item}' ";

$ret = mysqli_query( $conn, $o );

if($ret)
{
	echo "updated";
}
else
{
	echo "failed";
}

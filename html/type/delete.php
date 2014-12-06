<?php
include 'includes.php';

$x = $_GET['del'];
$q = "select * FROM company
WHERE username = '{$x}'";

$ret = mysqli_query( $conn, $q );

if($ret)
{
echo	$m =  "deleted";
}
else
{
echo	$m = "failed";
}

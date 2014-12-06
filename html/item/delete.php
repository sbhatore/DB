<?php
include 'includes.php';

$x = $_GET['del'];
$q = "DELETE FROM groc_list
WHERE prod_name = '{$x}'";

$ret = mysqli_query( $conn, $q );

if($ret)
{
echo	$m =  "deleted";
}
else
{
echo	$m = "failed";	
}

<?php
include 'includes.php';

$x = $_GET['del'];
$q = "DELETE FROM distributor
WHERE company_name = '{$x}'";

$ret = mysqli_query( $conn, $q );

if($ret)
{
echo	$m =  "deleted";
}
else
{
echo	$m = "failed";	
}

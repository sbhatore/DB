<?php
include 'includes.php';

$x = $_GET['del'];
$q = "DELETE FROM customer
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

$q = "DELETE FROM company
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



?>

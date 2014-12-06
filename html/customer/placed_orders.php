<?php include '../home/customer.php';
	include '../log/session.php';

$o = "SELECT * FROM cust_order WHERE cust_id='$login_session' ";

$ret = mysqli_query( $conn, $o );

?>
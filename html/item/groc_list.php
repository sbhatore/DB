
<?php
include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS groc_list( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'prod_id   VARCHAR(20) NOT NULL, '.
		'prod_name VARCHAR(50) NOT NULL, '.
		'supplier  VARCHAR(50) NOT NULL, '.
		'price   INT NOT NULL, '.
		'primary key ( id ))';

$retval = mysqli_query( $conn, $sql );
	


$pur_id = $_POST['pid'];
$name = $_POST['pn'];
$w_q = $_POST['wq'];
$p = $_POST['price'];

$sql = "INSERT INTO groc_list(prod_id, prod_name, supplier, price)
VALUES ('$pur_id', '$name', '$w_q', '$p' )";


if ($conn->query($sql) === TRUE) {
	    echo $m = "Item added successfully";
} else {
	    echo $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
//$message = $m;
$message = urlencode($m);
//$newURL = '"http://localhost/order.php?message=".$message';
header("Location: http://localhost/home/admin.php/?message=".$message);
die;
mysql_close($conn);
?> 

<?php
include '../includes.php';

/*$sql = 'CREATE TABLE  stock( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'prod_id VARCHAR(10) NOT NULL, '.
		'qty_left VARCHAR(10) NOT NULL, '.
		'primary key ( prod_id ))';

*/
$sql = 'CREATE TABLE IF NOT EXISTS stock( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'prod_id VARCHAR(20) NOT NULL, '.
		'qty_left  VARCHAR(20) NOT NULL, '.
		'primary key ( id ))';
$retval = mysqli_query( $conn, $sql );

if(!$retval)
{
	var_dump($retval);
}

$prod = $_POST['prod_id'];
$qty = $_POST['qty_left'];

$o = "SELECT * FROM groc_list WHERE prod_id='{$prod}' ";
$ret = mysqli_query($conn , $o);
$r = $ret->fetch_assoc();
$z = 0;
if($r)
{

$o = "SELECT * FROM stock WHERE prod_id='{$prod}' ";
$ret = mysqli_query($conn , $o);
$r = $ret->fetch_assoc();

if($r)
{
	$q = "UPDATE  stock SET qty_left= '{$qty}' WHERE prod_id = '{$prod}' ";
	$ret = mysqli_query($conn , $q);
	 $m = "stocks updated succesfully";
}
else
{
	$sqli = "INSERT INTO stock (prod_id, qty_left)
VALUES ('$prod', '$qty' )";

if ($conn->query($sqli) === TRUE) {
	     $m = "stocks updated succesfully";
} else {							
	    $m =  "Error: " . $sql . "<br>" . $conn->error;
}
}
echo $m;
}
else
{	
	$z = 1;
	 $m = "Invalid product id";
}
mysql_close($conn);
$message = $m;
$message = urlencode($m);
if($z == 1)
{
	header("Location: http://localhost/stock/stock_view.php?message=".$message);

}
else
{header("Location: http://localhost/home/admin.php?message=".$message);
}
die;

mysql_close($conn);
?> 
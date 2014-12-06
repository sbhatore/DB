
<?php
include 'includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS distributor( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'company_name   VARCHAR(20) NOT NULL, '.
		'address VARCHAR(40) NOT NULL, '.
		'contact  INT NOT NULL, '.
		'dues   INT NOT NULL, '.
		'primary key ( id ))';

$retval = mysqli_query( $conn, $sql );

$name = $_POST['cn'];
$add = $_POST['add'];
$con = $_POST['contact'];
$dues = $_POST['dues'];

$o = "SELECT * FROM distributor WHERE company_name='{$name}'";
$ret = mysqli_query( $conn, $o );
foreach($ret as $r)
{
	if ($r['company_name'] = $name)
	{
		$message = "this company name already exists";
		$message = urlencode($message);

	header("Location: http://localhost/distributor/distributor_pre.php?message=".$message);
	die;
	}

}

$sql = "INSERT INTO distributor(company_name, address, contact, dues)
VALUES ('$name', '$add', '$con', '$dues' )";


if ($conn->query($sql) === TRUE) {
	    echo $m = "Distributor Added";
} else {
	    echo $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
$message = urlencode($m);
$newURL = '"http://localhost/order.php?message=".$message';
header("Location: http://localhost/home/admin.php?message=".$message);
die;

mysql_close($conn);
?> 

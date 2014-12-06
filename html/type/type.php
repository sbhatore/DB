
<?php
include 'includes.php';

include '../log/session.php';

$type = $_POST['type'];
$user = $_POST['name'];
if($type == "employee"){

$x="emp_name";
$sql = 'CREATE TABLE IF NOT EXISTS employee( '.
		'emp_username VARCHAR(20) NOT NULL, '.
		'emp_id INT NOT NULL AUTO_INCREMENT, '.
		$x.' VARCHAR(20) NOT NULL, '.
		'emp_address  VARCHAR(20) NOT NULL, '.
		'emp_task   VARCHAR(20), '.
		'emp_dues    INT NOT NULL, '.
		'emp_attendance INT, '. 
		'emp_join_date VARCHAR(20) NOT NULL, '. 
		'age INT NOT NULL, '.
		'sex  VARCHAR(7) NOT NULL, '.
		'primary key ( emp_id ))';

$retval = mysqli_query( $conn, $sql );


$query = mysqli_query($conn, "SELECT * FROM company WHERE username='$user'");
$row = $query->fetch_assoc();
$name = $row['fullname'];
$add = $row['address'];
$emp_join_date = $row['reg_time'];
$age = $row['age'];
$sex = $row['sex'];



$sql = "INSERT INTO employee (emp_username,$x, emp_address, emp_join_date,age,sex)
VALUES ('$user','$name', '$add', '$emp_join_date','$age','$sex')";


if ($conn->query($sql) === TRUE) {
	    $m = "Privileges updated to employee";
} else {
	    $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
}
else if($type == "customer"){

	$sql = 'CREATE TABLE IF NOT EXISTS customer( '.
		'cust_id    INT NOT NULL AUTO_INCREMENT, '.
		'username VARCHAR(20) NOT NULL, '.
		'dues    INT NOT NULL, '.
		'primary key ( cust_id ))';

$query = mysqli_query($conn, $sql);

$sql = "INSERT INTO customer (username)
VALUES ('$user')";


if ($conn->query($sql) === TRUE) {
	    $m = "Priveleges Updated to customer";
} else {
	    $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);


}

	$sql = "UPDATE company SET type='$type' WHERE username='$user'";

$ret = mysqli_query($conn, $sql);


//$message = $m;
$message = urlencode($m);
$newURL = '"order.php?message=".$message';
header("Location:http://localhost/home/admin.php?message=".$message);
die;
mysql_close($conn);
?> 

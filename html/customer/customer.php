
<?php
include 'includes.php';
include '../log/session.php';

$sql = 'CREATE TABLE IF NOT EXISTS customer( '.
		'username VARCHAR(20) NOT NULL, '.
		'dues    INT NOT NULL, '.
		'primary key ( username ))';

$retval = mysqli_query( $conn, $sql );

$user = $_POST['name'];
$query = mysqli_query($conn, "SELECT * FROM company WHERE username='$user'");
$row = $query->fetch_assoc();
$name = $row['fullname'];
$add = $row['address'];
$emp_join_date = $row['reg_time'];
$age = $row['age'];
$sex = $row['sex'];
$task = $_POST['task'];

$sql = "INSERT INTO employee (emp_username,$x, emp_address, emp_task,emp_join_date,age,sex)
VALUES ('$user','$name', '$add', '$task','$emp_join_date','$age','$sex' )";


if ($conn->query($sql) === TRUE) {
	    $m = "New record created successfully";
} else {
	    $m =  "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($conn);
//$message = $m;
$message = urlencode($m);
$newURL = '"order.php?message=".$message';
header("Location:http://localhost/home/admin.php?message=".$message);
die;
mysql_close($conn);
?> 

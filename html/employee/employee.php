
<?php
include 'includes.php';
include '../log/session.php';
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
		'sex  VARCHAR(5) NOT NULL, '.
		'primary key ( emp_id ))';

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

<?php
include 'includes.php';

$x = $_GET['in'];
//echo $x;
$o = "SELECT * FROM employee WHERE emp_name='{$x}'";

$ret = mysqli_query( $conn, $o );
$r = $ret->fetch_assoc();?>

<p><b>user name</b> <?php echo $r['emp_username']?>
</p>
<p><b>employee ID</b> <?php echo $r['emp_id']; ?></p>
<p><b>employee name</b> <?php echo $r['emp_name']; ?></p>
<p><b>employee address</b> <?php echo $r['emp_address']; ?></p>
<p><b>employee task</b> <?php echo $r['emp_task']; ?></p>
<p><b>employee dues</b> <?php echo $r['emp_dues']; ?></p>
<p><b>employee attendance</b> <?php echo $r['emp_attendance']; ?></p>



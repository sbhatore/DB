<?php
include 'includes.php';
include '../log/session.php';

if($login_type == "admin")

	$x = $_GET['in'];

else
	$x = $login_session;
//echo $x;
$o = "SELECT * FROM employee WHERE emp_username='{$x}'";

$ret = mysqli_query( $conn, $o );
$r = $ret->fetch_assoc();

$p = "SELECT * FROM company WHERE username='{$x}' AND type = 'employee'";

$ret = mysqli_query( $conn, $p );
$q = $ret->fetch_assoc();
if($q){
?>
<script>

</script>
<div id="Sign-Up">
<fieldset style="width:30%"><h2>Employee Details</h2>
<table>
<?php if($login_type == "admin"){ ?>
<tr>
<td>Name</td><td> <input type="text" id="name" value= "<?php echo $r['emp_name'];?>" ></td>
</tr>
<?php } else{ ?>



<tr>
<td>Name</td><td> <?php echo $r['emp_name'];?> </td>
</tr>

<?php } ?>

<tr>
<td>Sex</td><td> <select id="sex">
	<option value="male"><?php echo $r['sex']; ?></option>
  <option value="female"><?php if($r['sex'] == "male") echo "female"; else echo "male" ?></option>
</select>
</td>
</tr>
<tr>
<td>Age</td><td><input type="text" id="age" value = <?php echo $r['age']; ?>></td>
</tr>
<?php if($login_type == "admin"){ ?>
<tr>
<td>Join Date</td><td><input type="text" id="emp_join_date" value = <?php echo $r['emp_join_date']; ?>></td>
</tr>

<?php } else{ ?>


<tr>
<td>Join Date</td><td><?php echo $r['emp_join_date']; ?></td>
</tr>
<?php }?>


<tr>
<td>Email</td><td> <input type="text" id="email" value=<?php echo $q['email']; ?> ></td>
</tr>
<tr>
<td>Home Address</td><td> <input type="text" id="address" value= "<?php echo $r['emp_address']; ?>" ></td>
</tr>

<?php if($login_type == "admin"){ ?>

<tr>
<td>Attendance</td><td> <input type="text" id="emp_attendance" value = <?php echo $r['emp_attendance']; ?> ></td>
</tr>



<tr>
<td>Dues</td><td> <input type="text" id="emp_dues" value = <?php echo $r['emp_dues']; ?> ></td>
</tr>
<tr>
<td>Task</td><td> <input type="text" id="emp_task" value = "<?php echo $r['emp_task']; ?>" ></td>
</tr>
<?php } else{ ?>



<tr>
<td>Attendance</td><td><?php echo $r['emp_attendance']; ?> </td>
</tr>



<tr>
<td>Dues</td><td><?php echo $r['emp_dues']; ?> </td>
</tr>
<tr>
<td>Task</td><td><?php echo $r['emp_task']; ?> </td>
</tr>

<?php } ?>

<tr>
<td><input id="button" type="submit" onclick = "updates()" value="Update"></td>

<?php if($login_type == "admin"){ ?>

<td><input id="button" type="submit" onclick="delete_item()" value="Delete"></button></td>
</tr>

<?php } ?>
<span id='query'> </span>

</table>
</fieldset>
</div>

<?php }
else{
	?>

	<p>Sorry!Employee doesn't exist. </p>

	<?php } ?>

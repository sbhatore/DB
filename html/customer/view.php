<?php
include 'includes.php';
include '../log/session.php';

if($login_type == "admin")

	$x = $_GET['in'];

else
	$x = $login_session;
//echo $x;
$o = "SELECT * FROM customer WHERE username='{$x}'";

$ret = mysqli_query( $conn, $o );
$r = $ret->fetch_assoc();

$p = "SELECT * FROM company WHERE username='{$x}' AND type = 'customer'";

$ret = mysqli_query( $conn, $p );
$q = $ret->fetch_assoc();
if($q){
?>


<div id="Sign-Up">
<fieldset style="width:30%"><h2>Customer Details</h2>
<table>
<?php if($login_type == "admin"){ ?>
<tr>
<td>Name</td><td> <input type="text" id="name" value= "<?php echo $q['fullname'];?>" ></td>
</tr>
<?php } else{?>

<tr>
<td>Name</td><td> "<?php echo $q['fullname'];?>" </td>
</tr>

<?php } ?>



<tr>
<td>Sex</td><td> <select id="sex">
	<option value="<?php echo $q['sex'];?>"><?php echo $q['sex'];?></option>
  <option value="<?php if($q['sex'] == "male") echo "female";else echo "male";?>"><?php if($q['sex'] == "male") echo "female";else echo "male";?></option>
</select>
</td>
</tr>
<tr>
<td>Age</td><td><input type="text" id="age" value = <?php echo $q['age']; ?>></td>
</tr>


<tr>
<td>Email</td><td> <input type="text" id="email" value=<?php echo $q['email']; ?> ></td>
</tr>
<tr>
<td>Home Address</td><td> <input type="text" id="address" value= "<?php echo $q['address']; ?>" ></td>
</tr>

<?php if($login_type == "admin"){ ?>

<tr>
<td>Dues</td><td> <input type="text" id="dues" value = <?php echo $r['dues']; ?> ></td>
</tr>

<?php } else{ ?>

<tr>
<td>Dues</td><td> <?php echo $r['dues']; ?> </td>
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
<p>Sorry! customer doesn't exist </p>
<?php } ?>

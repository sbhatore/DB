<?php
include 'includes.php';

$x = $_GET['in'];
//echo $x;
$o = "SELECT * FROM distributor WHERE company_name='{$x}'";
$ret = mysqli_query( $conn, $o );
		//$r = $ret->fetch_assoc();?>
<table border="1px">
	<tr>
<?php foreach($ret as $r) { ?>
<td>
<p><b>distributor id</b> <?php echo $r['id']?>
</p>
<p><b>company name</b> <?php echo $r['company_name']; ?></p>

<p><b>address</b> <?php echo $r['address']; ?></p>
<p><b>contact</b> <?php echo $r['contact']; ?></p>
<p><b>dues</b> <?php echo $r['dues']; ?></p>
</td>
<?php } ?>
</tr></table>
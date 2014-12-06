<?php
include 'includes.php';

$x = $_GET['in'];
//echo $x;
$o = "SELECT * FROM groc_list WHERE prod_id='{$x}'";
//echo $o;
$ret = mysqli_query( $conn, $o );
$r = $ret->fetch_assoc();?>

<p><b>Item Id</b> <?php echo $r['prod_id']?>
</p>
<p><b>Item Name</b> <?php echo $r['prod_name']; ?></p>
<p><b>Item Price</b>
<?php echo $r['price'];
?></p>	

<p><b>Item Supplier</b>
<?php echo $r['supplier'];
?></p>	


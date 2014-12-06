<?php
include 'includes.php';

$x = $_GET['in'];
//echo $x;
$o = "SELECT * FROM shop_order WHERE order_id='{$x}'";
$c = "SELECT * FROM shop_items WHERE order_id='{$x}'";
//echo $o;
$ret1 = mysqli_query( $conn, $c );
$ret = mysqli_query( $conn, $o );
if(!$ret)
{
	echo "invalid order id";
}
else
{
$r = $ret->fetch_assoc();?>

<p><b>order id</b> <?php echo $r['order_id']?>
</p>
<p><b>distributor name</b> <?php echo $r['distributor_name']; ?></p>
<p><b>items ordered</b> <?php
	foreach($ret1 as $v)
		echo $v['item']."{".$v['quantity']."}, ";
	?> 

<p><b>order time</b> <?php echo $r['order_time']; ?></p>
<p><b>delivery time</b> <?php echo $r['delivery_time']; ?></p>
<p><b>delivery status</b> <?php echo $r['delivery_status']; ?></p>
}


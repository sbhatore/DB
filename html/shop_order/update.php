<?php
include 'includes.php';

$x = $_GET['in'];
$y = $_GET['up'];
$item = $_GET['item'];
//echo $x;
$o = "UPDATE  shop_order SET {$x}= '{$y}' WHERE order_id = '{$item}' ";
$ret = mysqli_query( $conn, $o );

$o = "SELECT * FROM shop_order" ;
$ret = mysqli_query( $conn, $o );

foreach($ret as $r)
{
	if($r['delivery_status']=="yes")
	{	
		$o = "SELECT * FROM shop_items WHERE order_id = ".$r['order_id'] ;
		$ret1 = mysqli_query( $conn, $o );

		//var_dump($ret1);
		foreach($ret1 as $x)
		{	
			$o = "SELECT prod_id FROM groc_list WHERE prod_name = '{$x['item']}'" ;
			$ret2 = mysqli_query( $conn, $o );
			$pro = $ret2->fetch_assoc();
			//var_dump($pro);
			$pro =  $pro['prod_id'];
			$o ="SELECT qty_left FROM stock WHERE prod_id = '{$pro}'" ;
			$ret2 = mysqli_query( $conn, $o );
			$q = $ret2->fetch_assoc();
 			//var_dump($q['qty_left']);
 			$c = $q['qty_left'] + $x['quantity'];
			//var_dump($c);
			//echo $x['quantity'];
			$o = "UPDATE stock SET qty_left='{$c}' WHERE prod_id = '{$pro}'" ;	
			$ret2 = mysqli_query( $conn, $o );
			//var_dump($o);
		}


	}
}

if($ret)
{
	echo "updated";
}
else
{
	echo "failed";
}

<?php
include 'includes.php';
include '../log/session.php';

for($i=1;$i<=6;$i++){
	if($login_type == "admin" || ($login_type == "customer" && $i != 1 && $i != 6)){
		$y = $_GET['in'.$i];
		$x = $_GET['up'.$i];
		if($login_type == "admin")
			$item = $_GET['item'];
		else
			$item = $login_session;

		//echo $x;

		if($x == "dues"){
		
			$o = "UPDATE  customer SET {$x}= '{$y}' WHERE username = '{$item}' ";

			$ret = mysqli_query( $conn, $o );

			if($ret)
			{
				echo "updated";
			}
			else
			{
				echo "Error: " . $query . "<br>" . $conn->error;
			}
		}

		

		else{			

			$o = "UPDATE  company SET {$x}= '{$y}' WHERE username = '{$item}' ";

			$ret = mysqli_query( $conn, $o );

			if($ret)
			{
				echo "updated";
			}
			else
			{
				echo "Error: " . $query . "<br>" . $conn->error;
			}
		}

		}
	}
?>

<?php
include 'includes.php';
include '../log/session.php';

for($i=1;$i<=9;$i++){
	if($login_type == "admin" || ($login_type == "employee" && $i!=7 && $i!=8 && $i!=1 && $i!=9 && $i!=7 && $i!=4)){
		$y = $_GET['in'.$i];
		$x = $_GET['up'.$i];
		if($login_type == "admin")
			$item = $_GET['item'];
		else
			$item = $login_session;
		//echo $x;
		if($x != "email"){
			$o = "UPDATE  employee SET {$x}= '{$y}' WHERE emp_username = '{$item}' ";

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
		if($x == "emp_name" || $x == "emp_address" || $x == "email" || $x == "sex" || $x == "age" || $x == "emp_join_date"){
			if($x == "emp_name")
				$x = "fullname";
			if($x == "emp_address")
				$x = "address";
			if($x == "emp_join_date")
				$x = "reg_time";

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

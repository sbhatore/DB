
<?php
include '../includes.php';

$sql = 'CREATE TABLE IF NOT EXISTS daily_business( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'date   CHAR(20) NOT NULL, '.
		'total_sale  INT NOT NULL, '.
		'primary key ( id ))';

$retval = mysqli_query( $conn, $sql );
if($retval)
{
	echo "#Success";
}
<?php

include('includes.php');
if($_GET)
{
$q=$_GET['search'];

$o = "SELECT * FROM groc_list where prod_name like '%$q%' order by id LIMIT 5";
//echo "q is ".$q." ";
$ret = mysqli_query( $conn, $o );
			    $stack = array();

foreach($ret as $r)
{		

				array_push($stack, $r['prod_name']);


}
$stack = json_encode($stack);
echo $stack;

/*


$sql_res=mysql_query("select id,name,email from autocomplete where name like '%$q%' or email like '%$q%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['name'];
$email=$row['email'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);
?>
<div class="show" align="left">
<img src="author.PNG" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
</div>
<?php
}*/
}
?>
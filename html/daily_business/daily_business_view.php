<?php
include '../includes.php';
?>

<?php
include('../log/session.php');
if($login_type == "admin"){
	include '../home/admin.php';}
	else if($login_type == "customer"){
		include '../home/customer.php';	}
	else if($login_type == "employee"){
		include '../home/employee.php';	}
?>
<head>
 <link rel="stylesheet" type="text/css" href="http://localhost/CSS/table.css">



    <?php 
$o = "SELECT * FROM cust_order ";

$stack = array();
$ret = mysqli_query( $conn, $o );
for($i=0;$i<=30;$i++)
{  
	$b = 0;
	foreach($ret as $x) { 
			 if ($i == intval( substr($x['order_time'],0,2) ) )
			 {
				$b= $b + $x['bill'];		
			 }
	}
	array_push($stack, $b);

}
?>
<h1 align='center'> Daily Business</h1>
 <div id ="my"> </div>
		<div class="panel-body">
			<!--{{Form::open(array('url'=>'price_save',"class" => "form-horizontal bucket-form"))}}
			-->
      <table class="table-fill">
			<thead>
			<tr>
			<th class="text-left">Date</th>
      <th class="text-left">Total Sale</th>
      </tr>
			</thead>
			<tbody class="table-hover">
			<?php for($i=1;$i<=date("d");$i++) { ?>
			<tr>

        <td><?php  echo $date = "0".$i."/".date("m/y");

        $q = "INSERT INTO daily_business (date, total_sale)
         VALUES ( $date, $stack[$i])";
       	//var_dump($q);
        $ret = mysqli_query($conn , $q); 
        //var_dump($ret);
         ?>
        </td>
        <td class="text-left"><?php  
      echo   $stack[$i];	
         ?>
        </td>

        
			</tr>
      <?php 
          } ?>
			</tbody>
			</table>
		</div>
	</section>
	</div>
	</div>
	</section>
</section>

<?php
include 'includes.php';
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
$o = "SELECT * FROM groc_list ";

$ret = mysqli_query( $conn, $o );

$row=$ret->fetch_assoc();

?>
<h1 align='center'> List of Items</h1>
 <div id ="my"> </div>
		<div class="panel-body">
			<!--{{Form::open(array('url'=>'price_save',"class" => "form-horizontal bucket-form"))}}
			-->
      <table class="table-fill">
			<thead>
			<tr>
			<th class="text-left">Item Id</th>
      <th class="text-left">Item Name</th>
			<th class="text-left">Supplier</th>  
			<th class="text-left">Price</th>
			<th class="text-left">Quantity left</th>
      
      </tr>
			</thead>
			<tbody class="table-hover">
			<?php foreach($ret as $x) { 

				$query = "SELECT * from stock where prod_id = '$x[prod_id]'";
				$r = mysqli_query($conn, $query);
				$r = $r->fetch_assoc();

				?>
			<tr>
        <td class="text-left"><?php  echo $x['prod_id'] ?></td>
				
        <td><?php  echo $x['prod_name'] ?>
        </td>
        

        <td class="text-left"> <?php echo $x['supplier'] ?>	 </td>
          <td><?php echo $x['price'] ?></td>
          <td><?php echo $r['qty_left'] ?></td>
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

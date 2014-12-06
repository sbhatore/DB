<?php include 'placed_orders.php';?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/CSS/table.css">
</head>
<body>
<h1 align='center'> List of Items</h1>
 <div id ="my"> </div>
		<div class="panel-body">
			<!--{{Form::open(array('url'=>'price_save',"class" => "form-horizontal bucket-form"))}}
			-->
      <table class="table-fill">
			<thead>
			<tr>
			<th class="text-left">Order Id</th>
			<th class="text-left">Items</th>
      <th class="text-left">Order Time</th>
			<th class="text-left">Bill</th>  
			<th class="text-left">Delievery Status</th>
      
      </tr>
			</thead>
			<tbody class="table-hover">
			
			<?php


$o = "SELECT * FROM cust_order WHERE cust_id='$login_session' ";

$ret = mysqli_query( $conn, $o );


			 foreach($ret as $x) {

				$s = $x['order_id'];
				//var_dump($s);
				$query = "SELECT * FROM cust_items WHERE order_id='$s' " ;+
				
        		$y = mysqli_query( $conn, $query );
        		//$row=$y->fetch_assoc();
        		//var_dump($y);
       		 ?>

			<tr>
       
				
        <td><?php

          echo $x['order_id']; ?>
        </td>

        <td>
        <?php
        foreach($y as $z){
        echo $z['item']."->".$z['quantity'].";";?>
        <br>
    	<?php } ?>


        


        </td>
    

        <td class="text-left"> <?php echo $x['order_time'] ;?>	 </td>
        <td><?php echo $x['bill'] ;?></td>
          <td><?php echo $x['delievery_status'] ;?></td>

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
</body>
</html>
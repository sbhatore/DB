<?php
include 'includes.php';
include('../log/session.php');
include '../home/topbar.php';
?>

<?php

if($login_type == "admin")
    include '../home/navbar_admin.php';
  else
    include '../home/navbar_employee.php';

if($login_type != "admin" && $login_type != "employee"){
mysql_close($conn); // Closing Connection

header('Location: ../index.php?m'.$login_type); // Redirecting To Home Page
}
?>
<title>K_Traders</title>
<head>
<link href="http://localhost/CSS/login.css" rel="stylesheet" type="text/css">
<link href="http://localhost/CSS/navbar.css" rel="stylesheet" type="text/css">

<script>
var  up;
var val;
function del_row(cid)
{
 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("my").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","delete_order.php?in="+cid,true);
xmlhttp.send();
location.reload(); 
 
//document.getElementById("my").innerHTML=xmlhttp.responseText;
}
function update()
{
  alert("as");
}
function create(i,s)
{

  //var x = document.getElementById(i);
 // alert(i.innerHTML);
var b = document.createElement("button");
var t = document.createTextNode("update");
b.appendChild(t); 
 window.up = i.id;
 window.val = s;
b.onclick = function(){




var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("my").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update_order.php?in="+window.up+"&val="+window.val,true);
xmlhttp.send();





};
//b.value = "update";
i.appendChild(b);
//alert("dasd");
}
</script>
 <link rel="stylesheet" type="text/css" href="http://localhost/CSS/table.css">

</head>

<h1 align='center'>Customer Orders</h1>

<section class="">
	<section class = "wrapper">
	<div class = "row" >
	<div class = "col-lg-12">
	<section class="panel">
	

    <?php 
$o = "SELECT * FROM cust_order ";

$ret = mysqli_query( $conn, $o );

$row=$ret->fetch_assoc();

?>

<div id ="my"> </div>
		<div class="panel-body">
			<!--{{Form::open(array('url'=>'price_save',"class" => "form-horizontal bucket-form"))}}
			-->
      <table class="table-fill">
			<thead>
			<tr>
			<th class="text-left">Customer</th>
      <th class="text-left">Items</th>
			<th class="text-left">Order Time</th>
			<th class="text-left">Delievery Status</th>
      <th class="text-left">Bill (Rs)</th>
			<th class="text-left">Delete</th>
      </tr>
			</thead>
			<tbody class="table-hover">
			<?php foreach($ret as $x) { ?>
			<tr>
        <td class="text-left"><?php  echo $x['cust_id'] ?></td>
				
        <td><?php
        $y = "SELECT * FROM cust_items WHERE order_id=".$x['order_id'];
        $ret1 = mysqli_query( $conn, $y );
        //echo var_dump($ret1);
        $row=$ret1->fetch_assoc();
        foreach($ret1 as $s)
        {
          echo $s['item']."{".$s['quantity']."}  ";
        }
        ?>
        </td>
        

        <td class="text-left"> <?php echo $x['order_time'] ?>	 </td>
					<td class="text-left" id = <?php echo "td".$x['order_id'] ?> >
              <select>
                <option value="volvo" onclick="create(<?php echo 'td'.$x['order_id'] ?>,'NO')">NO</option>
                <option value="saab" onclick="create(<?php echo 'td'.$x['order_id'] ?>,'YES')">YES</option>
              </select>
          </td>
          <td class="text-left"> <?php echo $x['bill'] ?> </td>
        <td class="text-left"><button onclick="del_row(this.id)" id= <?php echo $x['order_id'] ?> >Delete</button></td>

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


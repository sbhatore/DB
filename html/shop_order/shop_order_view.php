<?php
include 'includes.php';
?>

<?php
include('../log/session.php');
if($login_type != "admin"){
mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
<title>K_Traders</title>
<head>
<link href="../CSS/login.css" rel="stylesheet" type="text/css">
<link href="../CSS/navbar.css" rel="stylesheet" type="text/css">


<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #c0c0c0;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: black;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
  border-bottom: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}

</style>

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
</script>
</head>


<section class="">
	<section class = "wrapper">
	<div class = "row" >
	<div class = "col-lg-12">
	<section class="panel">
		<header class="panel-heading">
		SHOP ORDERS
		</header>

    <?php 
$o = "SELECT * FROM shop_order ";

$ret = mysqli_query( $conn, $o );

$row=$ret->fetch_assoc();

?>

<body>

<?php include '../home/topbar.php'; ?>
<?php include '../home/navbar_admin.php'; ?>




<div id ="my"> </div>
		<div class="panel-body">
			<!--{{Form::open(array('url'=>'price_save',"class" => "form-horizontal bucket-form"))}}
			-->
      <table class="table-fill">
			<thead>
			<tr>
			<th class="text-left">Comapany Name</th>
      <th class="text-left">Items</th>
			<th class="text-left">Order Time</th>  
			<th class="text-left">Delievery Status</th>
      <th class="text-left">Delievery Date</th>
      <th class="text-left">Delete</th>
      </tr>
			</thead>
			<tbody class="table-hover">
			<?php foreach($ret as $x) { ?>
			<tr>
        <td class="text-left"><?php  echo $x['distributor_name'] ?></td>
				
        <td><?php
        $y = "SELECT * FROM shop_items WHERE order_id=".$x['order_id'];
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
					<td class="text-left" >
            <?php echo $x['delivery_status'] ?>
          </td>
          <td><?php echo $x['delivery_time'] ?></td>

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
</body>


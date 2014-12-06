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
 <link rel="stylesheet" type="text/css" href="atable.css">
<link href="../CSS/login.css" rel="stylesheet" type="text/css">
<link href="../CSS/navbar.css" rel="stylesheet" type="text/css">

</head>
<script>
var i = 1;
function add()
{

	var div = document.createElement('input');
	div.id = "i" + i;
	div.name = "i" + i;
	div.placeholder = "Item Name";
	var qty= document.createElement('input');
	qty.id = "q" + i;
	qty.type ="number";
	qty.name = "q" + i;
	qty.placeholder = "Quantity";
	qty.size = "2";

	b = document.createElement("br");

	//div.innerHTML = "Item name : <input size=1 id=" + 'I' + i  + ">" + "Quantity : <input size=1 id=" + 'Q' + i + ">";
	window.i = window.i+1;	
	var f = document.getElementById('myForm');
	//alert(f);
	f.appendChild(div);
	f.appendChild(qty);
	f.appendChild(b);

	s = document.getElementById("secrets");
	s.value = i-1;
	//document.write("<br>");                

}
function sub()
{
	//document.getElementById["myForm"].submit();
	document.forms[1].submit();
	sub1();

}
function sub1()
{
		document.forms[0].submit();
}


function show()
{
	var q = document.getElementById('query').value;
	var xmlhttp;
  xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
    else
    {
    		window.location="http://localhost/shop_order/shop_order_view.php";

    }
  }
xmlhttp.open("GET","view.php?in="+q,true);
xmlhttp.send();
alert(xmlhttp.responseText);
}

function update()
{
	var item = document.getElementById('query').value;
	var q = document.getElementById('sel').value;
	var up = document.getElementById('upd_in').value;
	var xmlhttp;
  xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","update.php?in="+q+"&up="+up+"&item="+item,true);
xmlhttp.send();
}

function reflect()
{
	var q = document.getElementById('sel').value;
	var z = document.getElementById('upd_in');
	if(q == 'delivery_status')
	{
		z.placeholder = 'Status to be updated';
	}
	else if(q == 'delivery_time')
	{
		z.placeholder = "delivery date/time to be updated";
	}		
	else if(q == 'distributor_name')
	{
		z.placeholder = "Distributor Name to be updated";
	}	
}


function delete_item()
{
	var item = document.getElementById('query').value;
	  xmlhttp=new XMLHttpRequest();  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("display").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","delete.php?del="+item,true);
xmlhttp.send();
}

function view()
{
	window.location="http://localhost/shop_order/shop_order_view.php";
}
</script>
	<?php
	if(isset($_GET['message'])){
    echo $_GET['message'];
}
?>
<body>

<?php include '../home/topbar.php'; ?>
<?php include '../home/navbar_admin.php'; ?>

	<table border="1">
	  <tr>
	    <td align="center">Shop Order</td>
	  </tr>
	  <tr>
	    <td>
	      <table>
	        <form method="post" action="shop_order.php">
	        <tr>
	          <td>Distributor Name</td>
	          <td><input type="text" name="cid" size="20">
	          </td>
	        </tr>
	        <tr>
		
	        </table>
	      </td>
	    </tr>
	</table>
</form>

	          
<form  method="post" id="myForm" action="shop_items.php">
<input type="hidden" id="secrets" name="secret" value="1">

</form> 
 
<button type="button" onclick="add()">add more items </button>
<button onclick="sub()">place order</button>


<br><br>

		<td><button onclick="view()">view orders</button>
		
	<br><br>
	<input placeholder="query" id="query">
	<table aligsn="center" border="1px">
	<tr>
		<td><button onclick="show()">view order</button></td>
			<td id="upd"><br>
			 <select id="sel" onclick="reflect()">
				  <option value="distributor_name">Distributor Name</option>
				  <option value="delivery_status">Deliver Status</option>
				  <option value="delivery_time">Delivery Date/Time</option>
				  
			</select> 
			<input id="upd_in"></input>
			<br>
			<button  onclick="update()">update</button>
		</td>

		<td><button onclick="delete_item()">Delete </button></td>
	</tr>
</table>
	<div id="display"> </div>

	</td>
	</table>
	</td>
	</tr>
	</body>

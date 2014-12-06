<head>
 <link rel="stylesheet" type="text/css" href="atable.css">
</head>
<script>
var i = 1;
function add()
{

	var div = document.createElement('input');
	div.id = "i" + i;
	div.name = "i" + i;
	div.placeholder = "Name";
	var qty= document.createElement('input');
	qty.id = "q" + i;
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
	document.forms[0].submit();
}
</script>
	<?php
	if(isset($_GET['message'])){
    echo $_GET['message'];
}
?>
	<table border="1">
	  <tr>
	    <td align="center">Order</td>
	  </tr>
	  <tr>
	    <td>
	      <table>
	        <form method="post" action="cust_order.php">
	        <tr>
	          <td>Customer ID</td>
	          <td><input type="text" name="cid" size="20">
	          </td>
	        </tr>
	        <tr>
		<td>Items qty</td>
		<td><input type="number" name="items" size="40">
		</td>
		</tr>
		<tr>
		<td>Delievery Status</td>
		<td><input type="text" name="status" size="20">
		</td>
		</tr>
	        </table>
	      </td>
	    </tr>
	</table>
</form>

	          
<form  method="post" id="myForm" action="cust_items.php">
<input type="hidden" id="secrets" name="secret" value="1">

</form> 
 
<button type="button" onclick="add()">add more </button>
<button onclick="sub()">cust_order</button>

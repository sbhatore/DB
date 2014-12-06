<?php
include '../home/admin.php';
?>	
<head>

 <link rel="stylesheet" type="text/css" href="atable.css">
<script>
function view_tb()
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
  }
xmlhttp.open("GET","view.php?in="+q,true);
xmlhttp.send();
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
	if(q == 'supplier')
	{
		z.placeholder = 'supplier to be updated';
	}
	else if(q == 'prod_id')
	{
		z.placeholder = "ID to be updated";
	}		
	else if(q == 'prod_name')
	{
		z.placeholder = "Name to be updated";
	}	
	else
	{
		z.placeholder = "price to be updated";
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

</script>

</head>

<body>


	<table align='center' border="1">
	  <tr>
	    <td align="center">Grocery Materials</td>
	  </tr>
	  <tr>
	    <td>
	      <table>
	        <form method="post" action="groc_list.php">
	        <tr>
	          <td>Product id</td>
	          <td><input type="text" name="pid" size="20">
	          </td>
	        </tr>
	        <tr>
		<td>Product Name</td>
		<td><input type="text" name="pn" size="40">
		</td>
		</tr>
		<tr>
		<td>Supplier</td>
		<td><input type="text" name="wq" size="20">
		</td>
		</tr>

		<tr>
		<td>Price</td>
		<td><input type="text" name="price" size="20">
		</td>
		</tr>
		<tr>
		<td></td>
	          <td align="right"><input type="submit"
	          name="submit" value="Add"></td>
	        </tr>
	    </form>
	        </table>
	      </td>
	    </tr>
	</table>
<br><br>
	<input  id="query">
	<table aligsn="center" border="1px">
	<tr>
		<td><button onclick="view_tb()">view item</button></td>
			<td id="upd"><br>
			 <select id="sel" onclick="reflect()">
				  <option value="prod_id">Item Id</option>
				  <option value="prod_name">Item Name</option>
				  <option value="price">Price</option>
				  <option value="supplier">Supplier</option>
			</select> 
			<input id="upd_in"></input>
			<br>
			<button  onclick="update()">update an item</button>
		</td>

		<td><button onclick="delete_item()">Delete item</button></td>
	</tr>
</table>
	<div id="display"> </div>
	</body>
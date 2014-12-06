<?php
include 'includes.php';
?>
<?php include '../home/customer.php';?>
<?php
include('../log/session.php');
if($login_type != "customer"){
mysql_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>
<head>
 <link rel="stylesheet" type="text/css" href="atable.css">
</head>
<script type="text/javascript" src="v.js"></script>
<script>
var i = 1;
var sec = 1;
function add()
{

  var div = document.createElement('input');
  div.id = 'query' + i;
  window.sec = i;
  div.onkeyup = function() 
{
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "get_items.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
};

$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});

  div.name = "i" + i;
  div.placeholder = "Item Name";
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
  document.forms[0].submit();
  document.forms[1].submit();
}

function view_tb()
{
  window.location="http://localhost/cust_order/cust_order_view.php";
}

function modify_supplier(event) {
  var a = document.getElementById("text_input");
  a.value = event.target.innerHTML;
}

function get_items()
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
    Info_Title=xmlhttp.responseText;
    json_output=eval("("+Info_Title+")");

   var myNode = document.getElementById("display_supplier");
     while (myNode.firstChild)
      {
           myNode.removeChild(myNode.firstChild);
      } 

        for (var i in json_output)
        {
              var temp=json_output[i];
              var div = document.createElement('div');
              var t="supplier" + i;
              div.id = t;
              div.innerHTML=temp;
              
              document.getElementById("display_items").appendChild(div)                
        
              var sup = document.getElementById(t);
              sup.addEventListener("click", modify_supplier , false);
              document.getElementById("display_items").appendChild(div)                
        
        }

    }
  }
    var user_input=document.getElementById("query").value
  
xmlhttp.open("GET","get_items.php?in="+user_input,true);
xmlhttp.send();

}


/*
$(function(){
$("#query1").keyup(function() 
{
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "get_items.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
*/
</script>
<p >
  <font  color="red"> <?php
  if(isset($_GET['message'])){
    echo $_GET['message'];
}
?>

</font>
</p>
   <h2 float:left>Order</h2>
              <form method="post" action="cust_order.php">
             <input type="hidden" name="cid" size="20">
             </form>
            
<form  method="post" id="myForm" action="cust_items.php">
<input type="hidden" id="secrets" name="secret" value="1">

</form> 
 <div id="result"></div>
<button type="button" onclick="add()">add more items </button>
<button onclick="sub()">place order</button>


<br><br>

    <button onclick="view_tb()">view orders</button>
    
  <div id="display"> </div>
  
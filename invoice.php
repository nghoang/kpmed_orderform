<?php
require_once "config.php";
$ID = $_GET["oid"];
$query = mysql_query("SELECT * FROM `order` WHERE order_id='{$ID}'");

if (!$query)
	die("No Order");
$o = mysql_fetch_object($query);
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>HTML Invoice Template</title>
<style type="text/css">
<!--
body {
  font-family:Tahoma;
}

img {
  border:0;
}

#page {
  width:800px;
  margin:0 auto;
  padding:15px;

}

#logo {
  float:left;
  margin:0;
}

#address {
  height:181px;
  margin-left:250px; 
}

table {
  width:100%;
}

td {
padding:5px;
}

tr.odd {
  background:#e1ffe1;
}
-->
</style>
</head>
<body>
<div id="page">
  <div id="logo">
    <a href="http://www.danifer.com/"><img src="http://www.danifer.com/images/invoice_logo.jpg"></a>
  </div><!--end logo-->
  
  <div id="address">

    <p>Your company name<br />
    <a href="mailto:youremail@somewhere.com">youremail@somewhere.com</a>
    <br /><br />
    Transaction # xxx<br />
    Created on 2008-10-09<br />
    </p>
  </div><!--end address-->

  <div id="content">
    <p>
      <strong>Customer Details</strong><br />
      Name: <?php echo $o->first_name;?>, <?php echo $o->last_name;?><br />
      Email: <?php echo $o->email;?><br />
      Payment Type: Direct    </p>
    <hr>
    <?php $total = 0;?>
    <table>
      <tr><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>Unit Price</strong></td><td><strong>Amount</strong></td></tr>
      
      <tr class="odd">
      <td>Tropical Citrus</td><td><?php echo $o->item_1_count;?></td>
      <td><?php echo $o->item_1_price;?></td>
      <td><?php $t = $o->item_1_count * $o->item_1_price; $total += $t; echo $t;?></td></tr>
      
      <tr class="even">
      <td>Lemonade</td>
      <td><?php echo $o->item_2_count;?></td>
      <td><?php echo $o->item_2_price;?></td>
      <td><?php $t = $o->item_2_count * $o->item_2_price; $total += $t; echo $t;?></td></tr>
      
      <tr class="odd">
      <td>Dragonfruit</td>
      <td><?php echo $o->item_3_count;?></td>
      <td><?php echo $o->item_3_price;?></td>
      <td><?php $t = $o->item_3_count * $o->item_3_price; $total += $t; echo $t;?></td></tr>              <tr><td>&nbsp;</td><td>&nbsp;</td><td><strong>Total</strong></td><td><strong><?php echo $total;?></strong></td></tr>

    </table>
    <hr>
    <p>
      Thank you for your order!  This transaction will appear on your billing statement as "Your Company".<br />
      If you have any questions, please feel free to contact us at <a href="mailto:youremail@somewhere.com">youremail@somewhere.com</a>.
    </p>

    <hr>
    <p>
      <center><small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited.
      <br /><br />
      &copy; Your Company All Rights Reserved
      </small></center>
    </p>
  </div><!--end content-->
</div><!--end page-->
</body>

</html>

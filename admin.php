<?php
require_once "config.php";

$query = mysql_query("SELECT * FROM `order` ORDER BY created_date DESC");
?><html>
	<head></head>
	<body>
	<h1>Admistrator</h1>
	<h2>Manage Orders</h2>
	<ul>
	<?php
	while ($row = mysql_fetch_object($query))
	{
		echo '<li><a target="_blank" href="invoice.php?oid='.$row->order_id.'">'.$row->first_name.' '.$row->last_name.'</a> - order date: '.$row->created_date.'</li>';
	}
	?>
	</ul>
	</body>
</html>

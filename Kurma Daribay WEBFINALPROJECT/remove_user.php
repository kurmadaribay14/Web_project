<?php
	$name = $_GET['remname'];
	include('connection.php');
	if($name!='') mysql_query("DELETE FROM user WHERE username='".$name."'");
	header("Location: admin.php?removed=true");
?>
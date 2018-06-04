<?php
include("connection.php");
$username = $_GET['username'];
$password = $_GET['password'];
$result = mysql_query("SELECT * FROM user WHERE username = '".$username."'");
$row = mysql_fetch_array($result);
if($row['password'] == md5($password))
{
	session_start();
	$_SESSION['username'] = $row['username'];
    if($row['admin'] == true)
	    header("Location: admin.php");
	else 
		header("Location: all.php");
}
else header("Location: myaccount.php?login=false"); 
?>
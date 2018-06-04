<?php
include("connection.php");
$username = $_GET['username'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$email = $_GET['email'];
$city = $_GET['city'];
$password = $_GET['password'];
$request = "INSERT INTO user (Username, Name, Surname, Email, City, Password) VALUES ('".$username."', '".$name."', '".$surname."', '".$email."', '".$city."', '".md5($password)."')";
mysql_query($request);
mysql_close($con);
header("Location: myaccount.php");
?>
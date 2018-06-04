<?php
include("connection.php");
$id = $_GET['id'];
$query = "DELETE FROM books WHERE id=".$id;
$result = mysql_query($query);
$num = mysql_num_rows($result);
header("Location:admin.php");
?>
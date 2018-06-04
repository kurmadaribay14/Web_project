<?php
$id = $_REQUEST['id'];
$bookname = $_REQUEST['bookname'];
$category = $_REQUEST['category'];
$description = $_REQUEST['description'];
$picture = $_REQUEST['picture'];
$read = $_REQUEST['readbook'];
include("connection.php");
$query = "UPDATE books SET bookname = '".$bookname."', category ='".$category."', description ='".$description."', picture ='".$picture."', readbook ='".$read."' WHERE id = '".$id."'";
$result = mysql_query($query);
// $num = mysql_num_rows($result);
if($result > 0)
	{header("Location:admin.php?edit=true");}
else{
    header("Location: admin.php?edit=false");
}
?>
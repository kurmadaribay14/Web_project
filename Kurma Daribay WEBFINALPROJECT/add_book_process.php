<?php
session_start();
$bookname = $_POST['bookname'];
$category = $_POST['category'];
$description = $_POST['description'];
$read = $_POST['readbook'];
//creating path to an image folder
$photo_path = "./images/";
$photo_path = $photo_path . basename($_FILES['file']['name']);
//try to upload photo
if(move_uploaded_file($_FILES['file']['tmp_name'], $photo_path)) {
    //connect to database
	include("connection.php");
	//creating SQL query 
    $statement = "INSERT INTO books (bookname, category, description, picture, readbook) VALUES('$bookname', '$category', '$description', '$photo_path', '$read')";
    //executing query
    mysql_query($statement);
    //closing connection
	mysql_close($con);
	//redirecting to previous page
	header("Location: admin.php?insert=true");
} 
else{
	mysql_close($con);
	//if file didn't upload then return and show error message
    header("Location: admin.php?insert=false");
}
?>
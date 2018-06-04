<?php
session_start();
if($_SESSION['username'] == '')
  header("Location: myaccount.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ALL</title>
	
	<style type="text/css">
	
	.qwerty a:visited{
		color: pink;
	    background-color: transparent;
	    text-decoration: none;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>	
	<div id="container">
		<div id="header">
			<?php 
				include("header.php");
			?>           
        </div>
        <div id="centercol">
		<div id="leftcol">
						<div class="title">All books</div>
						
        <?php   include("connection.php");
		$result = mysql_query("SELECT * FROM books ORDER BY bookname");
		$counter = 0;
		while(($row = mysql_fetch_array($result)))
		{?> 
        <div class="obox"><div class="bimg"><a href="<?=$row['readbook']?>"><img src="<?=$row['picture']?>" 
        	alt="<?=$row['bookname']?>" title="<?=$row['bookname']?>"/></a></div>
	    <div class="box">
        <div class="btitle"><h2 class="qwerty"><a href="<?=$row['readbook']?>" title="<?=$row['bookname']?>"><?=$row['bookname']?></a></h2></div>
                    <p class="details">"<?=$row['description']?></p></div>
                    <div class="clear"></div></div>
        <?php $counter++; } ?>
        </div>
		<div id="rightcol"> <?php include("right.php");	?> 	</div>
		<div class="clear"></div>
        <footer> <?php include("footer.php"); ?> </div></footer>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>LIBRARY</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>	
	<div id="container">
		<div id="header">
      <?php 
        include("header.php");
      ?>           
        </div>
		<div id="centercoll">
		<div id="leftcol"><h4>Welcome To Our Library!</h4>
    <h1><strong>IT'S NICE TO MEET YOU!!!</strong></h1>
    <form name="comment" action="comment.php" method="post">
  <p><label style="color:white">Name:</label>        <input type="text" name="name" /></p>
  <p>
    <label style="color:white">Comment:</label>
    <br />
    <textarea name="text_comment" cols="115" rows="30"></textarea>
  </p>
  <p>
    <input type="hidden" name="page_id" value="10" />
    <input type="submit" value="Отправить" />
  </p>
</form>
    </div>
    <div class="clear"></div>
        <footer> <?php include("footer.php"); ?> </div></footer>
	</div>
</body>
</html>
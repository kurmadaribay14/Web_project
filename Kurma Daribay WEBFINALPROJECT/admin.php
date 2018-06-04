<?php
session_start();
if($_SESSION['username'] != 'nazerke')
  header("Location: myaccount.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Admin</title>
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
	    	<p class='title'>Welcome to administratory:</p>
	    	<div class='contact_form'><label class='adminkolabel'><a href="add_book.php">Add Book</a></label></div>
	    	<div id="info">
			<?php
      			if(isset($_REQUEST['insert']))
            				{
				 	if(($_REQUEST['insert'] == 'true')) echo "<span style='color:green'>Added successful</span>";
					else 	echo "<span style='color:red'>Error while adding</span>";
				}
			?>
		</div>
	<div class='contact_form'>
	<form action="remove_user.php" method="get">
		<label for='remname' class='adminkolabel'>Remove User:</label>
        <select name='remname' id="remname">
        	<?php 
				include('connection.php');
				$result=mysql_query('SELECT username FROM user');
				while($row=mysql_fetch_array($result)){
					if($row['username']!='nazerke') echo "<option value='".$row['username']."'>".$row['username']."</option>";
				}
			?>
        </select>
        <input type='submit' value='Remove'/>
    </form>
</div>
<div class='contact_form'>
	<form action="edit.php" method="get">
		<label for='id' class='adminkolabel'>Edit Book:</label>
        <select name='id' id="id">
        	<?php 
				include('connection.php');
				$result=mysql_query('SELECT id FROM books');
				while($row=mysql_fetch_array($result)){
					if($row['id']>0) echo "<option value='".$row['id']."'>".$row['id']."</option>";
				}
			?>
        </select>
        <input type='submit' value='Edit'/>
    </form>
</div>
<div class='contact_form'>
	<form action="delete.php" method="get">
		<label for='id' class='adminkolabel'>Delete Book:</label>
        <select name='id' id="id">
        	<?php 
				include('connection.php');
				$result=mysql_query('SELECT id FROM books');
				while($row=mysql_fetch_array($result)){
					if($row['id']>0) echo "<option value='".$row['id']."'>".$row['id']."</option>";
				}
			?>
        </select>
        <input type='submit' value='Delete'/>
    </form>
</div>
		    <div id="info">
		<?php
    	if(isset($_GET['removed'])){
			if($_GET['removed']=='true') echo "<span style='color:green; font-size:12px; margin:15px;'><strong>Removed successfully</strong></span>";
			else echo "<span style='color:red; font-size:12px; margin:15px;'><strong>You don't have enough access privilegies:</strong></span>";
		}
	?>
        </div>
		 <div id="info">
			<?php
      			if(isset($_REQUEST['edit']))
            				{
				 	if(($_REQUEST['edit'] == 'true')) echo "<span style='color:green'>True</span>";
					else 	echo "<span style='color:red'>False</span>";
				}
			?>
		</div>
       </div>
		<div id="rightcol"> <?php include("right.php");	?> 	</div>
		<div class="clear"></div>
		</div>
        <footer> <?php include("footer.php"); ?> </footer>
</div>
</body>
</html>
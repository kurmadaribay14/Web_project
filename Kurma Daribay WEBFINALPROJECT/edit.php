<!DOCTYPE html>
<?php
session_start();
if($_SESSION['username'] != 'nazerke')
  header("Location: myaccount.php");
?>
<html><head><meta charset="utf-8" />
<title>Edit Book</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head><body>
<div id="container">
       <div id="header">
       		<?php 
				include("header.php");
			?>           
       </div> 
       <div id="centercol">
       	<div id="leftcol">
        <?php
        include("connection.php");
        $id = $_GET['id'];
        $query = "SELECT * FROM books WHERE id=".$id."";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result); ?>
		<form action="edit_process.php" method="post">
      <div class="form_row">
               <input type="hidden" class="contact_input" name="id" value="<?=$row['id']?>"/>
            </div>
			<div class="form_row">
               <label class="contact"><strong>Book Name:</strong></label>
               <input type="text" class="contact_input" name="bookname" value="<?=$row['bookname']?>"/>
            </div>
            <div class="form_row">
                    <label class="contact"><strong>Category</strong></label>
                    <input type="text" class="contact_input" name="category" 
                    value="<?=$row['category']?>" />
                </div> 
			<div class="form_row">
                   <label class="contact"><strong>Description:</strong></label>
  <textarea class="contact_textarea"  name="description" value="<?=$row['description']?>"></textarea>
            </div> 
			<div class="form_row">
                    <label class="contact"><strong>Picture:</strong></label>
                    <input type="text" class="contact_input" name="picture" id="file" value="<?=$row['picture']?>" />
            </div> 
      <div class="form_row">
                    <label class="contact"><strong>Read:</strong></label>
                    <input type="text" class="contact_input" name="readbook" value="<?=$row['readbook']?>" />
            </div>
		<div class="form_row">
                    <input type="submit" class="register" value="Edit" />
            </div> </form>
		<div class="clear"></div>
        </div><!--end of left content-->
        <div id="rightcol"> <?php include("right.php");	?></div>
		<div class="clear"></div>
        <footer> <?php include("footer.php"); ?></footer>
      </div>
</div>

</body>
</html>
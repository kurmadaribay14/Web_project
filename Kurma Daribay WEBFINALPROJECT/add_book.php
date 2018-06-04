<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
<link rel="stylesheet" type="text/css" href="style.css" />

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
		<form action="add_book_process.php" method="post" enctype="multipart/form-data">
			<div class="form_row">
               <label class="contact"><strong>Book Name:</strong></label>
               <input type="text" class="contact_input" name="bookname" />
            </div>
            <div class="form_row">
                    <label class="contact"><strong>Category</strong></label>
                    <input type="text" class="contact_input" name="category" />
                </div> 
			<div class="form_row">
                   <label class="contact"><strong>Description:</strong></label>
                   <textarea class="contact_textarea" cols="30" rows="7" name="description"></textarea>
            </div> 
			<div class="form_row">
                    <label class="contact"><strong>Picture:</strong></label>
                    <input type="file" class="contact_input" name="file" id="file" />
                </div> 
            <div class="form_row">
               <label class="contact"><strong>Read:</strong></label>
               <input type="text" class="contact_input" name="read" />
            </div>
				
				<div class="form_row">
                    <input type="submit" class="register" value="add book" />
                </div> 
		</form>
		<div class="clear"></div>
        </div><!--end of left content-->
        <div id="rightcol"> <?php include("right.php");	?> 	</div>
		<div class="clear"></div>
        <footer> <?php include("footer.php"); ?> </div></footer>
</div>

</body>
</html>
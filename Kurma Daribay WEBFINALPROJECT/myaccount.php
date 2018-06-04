<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>SIGN IN</title>
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
    <?php
    if(isset($_SESSION['username'])){
      echo "<span style='float:right; color:green;'>Welcome " . $_SESSION['username']."</span>";
    }    ?>
            <div class="title">My account</div>
                <div class="contact_form">
                <div class="form_subtitle">login into your account</div>
                 <form name="register" action="check.php" method="GET">          
                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input type="text" class="contact_input" name="username" />
                    </div>  
                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input type="password" class="contact_input" name="password" />
                    </div>                     
                    <div class="form_row">
                        <div class="terms">
                        <input type="checkbox" name="terms" />
                        Remember me
                        </div></div> 
                    <div class="form_row">
          <input type="submit" class="register" value="login" />
                    <a href="logout.php" class="logout"><input type="button" class="register" value="logout" /></a>
                    </div>
          <div class="form_row">    
          <?php         
          if(isset($_GET['login'])) { if($_GET['login'] == "true")
          echo " <label class='contact'><strong style='color:red'>Login was successful</strong></label>";
          else echo " <label class='contact'><strong style='color:red'>Login was not successful</strong></label>";}
          ?>
          </div>
        </form></div></div><div id="rightcol"> <?php include("right.php");  ?>  </div>
    <div class="clear"></div>
        <footer> <?php include("footer.php"); ?> </div></footer>
</div></div></body></html>
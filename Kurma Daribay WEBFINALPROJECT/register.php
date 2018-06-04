<?php
if(!empty($_POST["register-user"])) {
    /* Form Required Field Validation */
    foreach($_POST as $key=>$value) {
        if(empty($_POST[$key])) {
        $error_message = "All Fields are required";
        break;
        }
    }
    /* Password Matching Validation */
    if($_POST['password'] != $_POST['confirm_password']){ 
    $error_message = 'Passwords should be same<br>'; 
    }

    /* Email Validation */
    if(!isset($error_message)) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid Email Address";
        }
    }

    /* Validation to check if gender is selected */
    if(!isset($error_message)) {
    if(!isset($_POST["gender"])) {
    $error_message = " All Fields are required";
    }
    }

    if(!isset($error_message)) {
        include("connection.php");
        $request = "INSERT INTO user (Username, Name, Surname, Gender, Email, City, Password) VALUES ('".$_POST["username"] ."', '".$_POST["name"] ."', '".$_POST["surname"] ."', '".$_POST["gender"] ."','".$_POST["email"] ."', '".$_POST["email"] ."', '".md5($_POST["password"]) ."')";
        $result = mysql_query($request);
        if(!empty($result)) {
            $error_message = "";
            $success_message = "You have registered successfully!"; 
            unset($_POST);
        } else {
            $error_message = "Problem in registration. Try Again!"; 
        }
    }
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>REGISTER</title>
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
			<div class="title">Register</div>
        
        	<div class="">
              	<div class="contact_form">
                <div class="form_subtitle">create new account</div>
                 <form name="register" action="" method="post">
                 <?php if(!empty($success_message)) { ?>    
        <div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
        <?php } ?>
        <?php if(!empty($error_message)) { ?>   
        <div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
        <?php } ?>          
                    <div class="form_row">
                    <label class="contact"><strong>Username:</strong></label>
                    <input type="text" class="contact_input" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
                    </div>  


                    <div class="form_row">
                    <label class="contact"><strong>Full Name:</strong></label>
                    <input type="text" class="contact_input" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"/>
                    </div> 

                   <!-- <div class="form_row">
                    <label class="contact"><strong>Surname:</strong></label>
                    <input type="text" class="contact_input" name="surname" value="<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>"/>
                    </div>
                    <div class="form_row">
                    <label class="contact"><strong>Gender:</strong></label>
                    <input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
                    <input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
                    </div>-->
                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" class="contact_input" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
                    </div>
                    
                   <!-- <div class="form_row">
                    <label class="contact"><strong>City:</strong></label>
                    <input type="text" class="contact_input" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>"/>
                    </div>-->
                    
                    <div class="form_row">
                    <label class="contact"><strong>Password:</strong></label>
                    <input type="password" class="contact_input" name="password" value="" />
                    </div>

                    <div class="form_row">
                    <label class="contact"><strong>Conf Pass</strong></label>
                    <input type="password" class="contact_input" name="confirm_password" value=""/>
                    </div>                    
                    
                    <div class="form_row">
                    <input type="submit" name="register-user" class="register" value="register" />
                    </div>   
                  </form>    
                </div>
          </div>	
        <div class="clear"></div>
		</div>
		<div id="rightcol"> <?php include("right.php");	?> 	</div>
		<div class="clear"></div>
        <footer> <?php include("footer.php"); ?> </div></footer>
</div>
</body>
</html>
<?php
session_start();
session_destroy();
header("Location: myaccount.php");
?>
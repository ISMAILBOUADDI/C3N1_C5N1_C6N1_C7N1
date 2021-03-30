<?php
DEFINE('DB_HOST',"localhost");
DEFINE('DB_USER',"root");
DEFINE('DB_PASS',"root");
DEFINE('DB_NAME','web');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) 
or die("Error:can't connect to server");
?>

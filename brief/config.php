<?php
$con = mysqli_connect("localhost","root","root") or die("Error:can't connect to server");
$db = mysqli_select_db($con,"brief_php")  or die("Error:can't connect to database");
?>

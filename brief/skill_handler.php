<?php
$html = $_POST["html"];
$cgi = $_POST["cgi"];
$js = $_POST["js"];
$ajax = $_POST["ajax"];
$php = $_POST["php"];
include "config.php";
$insertUser="INSERT INTO technos(html,cgi,js,ajax,php) values('$html','$cgi','$js','$ajax','$php')";
$result=mysqli_query($con,$insertUser);
if($result){
    echo "<h1>your information sent Succssfully </h1>";
}
else{
    echo"Error:".mysqli_error($con);
}
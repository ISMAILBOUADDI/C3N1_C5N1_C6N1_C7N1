<?php
$email = $_POST["email"];
include "config.php";
$login="SELECT email FROM developers WHERE email ='$email'";
$result=mysqli_query($con,$login);
$count=mysqli_num_rows($result);
if($count==1){
    session_start();
    $_SESSION["loggedUser"]=$email;
 header('location:list.php');
}
else{
    echo"Error:";
}
?>
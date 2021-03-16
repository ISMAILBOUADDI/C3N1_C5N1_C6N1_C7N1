<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
include "config.php";
$insertUser="INSERT INTO developers(firstName,lastName,email) values('$firstName','$lastName','$email')";
$result=mysqli_query($con,$insertUser);
if($result){
    echo "<h1>User Created Succssfully </h1>";
}
else{
    echo"Error:".mysqli_error($con);
}
?>
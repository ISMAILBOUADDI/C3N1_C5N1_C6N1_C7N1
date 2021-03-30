<?php

              if(isset($_POST['submit'])) {
                if(!empty($_POST['firstName']) AND !empty($_POST['email']) && !empty($_POST['lastName'])) {
                  $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
                $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING) ;
                  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
                  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
                  $role = filter_var($_POST['role'], FILTER_SANITIZE_STRING);
                  // $passhansh =  password_hash($password ,PASSWORD_BCRYPT);
                  include "config.php";     
                    $query = "INSERT INTO developers (firstName,lastName,email,password,role) values ('$firstName', '$lastName','$email','$password','$role')";                
                      $r= mysqli_query($con , $query);
                   if (!$r) {
                      die('erreur§§§').mysqli_error($con);
                   }
                elseif ($r) {
                  session_start() ; 
                 $_SESSION['db_firstName'] = $firstName;
                 $_SESSION['db_lastName']=$lastName;
                 $_SESSION['db_email']=$email;
                      header("location: skill.php");
              }
        
         
        }
     
     }
  
?>
<?php
include "config.php";
DEFINE('BASE_URI','http://'.$_SERVER['SERVER_NAME'].'/BREIF/');



if(isset($_POST['envoyer']))
{

    $email = filter_var(trim(strip_tags($_POST["email"])), FILTER_SANITIZE_STRING);
    $pass =filter_var( trim(strip_tags($_POST["password"])), FILTER_SANITIZE_STRING);
   
    if(!empty($email) || !empty($pass))
    {
        $query = "SELECT * from developers WHERE email = '$email' AND password='$pass'";
        if($result=mysqli_query($con,$query))
        {
           
           while($data = mysqli_fetch_assoc($result))
           {  
                
               if($data['email'] == $email &&
                $data['password'] == $pass)
               {     
                    $success = 'Bien';
                    header('Location: '.BASE_URI.'profile.php?success='.$success);
                    session_start();
                    $_SESSION['db_firstName']=$data['firstName'];
                    $_SESSION['db_lastName']=$data['lastName'];
                    $_SESSION['db_email']=$data['email'];
                    $_SESSION['db_role']=$data['role'];
                    
                    exit;
               }
               else {
                   $error="Try something else";
                   header('Location: '.BASE_URI.'admin.php?error='.$error);
                   exit;
               }
              
              }
                 
   
           }
            }
    
        }
    
?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="./src/main.css">
</head>

<body>
    <div class="container">
    <form class="form" id="login" action="<?= BASE_URI ?>index.php" method="POST">
            <h1 class="form__title">Login</h1>
            <div class="form__input-group">
                <input type="email" class="form__input" placeholder="email" name="email">
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="password" name="password">
                <div class="form__input-error-message"></div>
            </div>
            <input class="form__button" type="submit" name="envoyer" value="send">
            <p class="form__text">
                <a class="form__link" href="./" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>
        </form>
       
        
        <form class="form form--hidden" id="createAccount" onsubmit="return validation()" action="register_handler.php" method="post">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <select name='role'>
<option value='admin'>admin</option>
<option value='dev'>dev</option>
</section>
            </div>
            <div class="form__input-group">
                <input type="text" id="signupFirstname" class="form__input"  placeholder="firstName" name="firstName">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  placeholder="lastName"  name="lastName">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  placeholder="email" name="email">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="password" name="password">
                <div class="form__input-error-message"></div>
            </div>
            
            <button class="form__button" type="submit" name="submit">Continue</button>
            <p class="form__text">
            <a href="skill.php">after registration plz check hrer to select ur skills</a>
            </p>
            
            <p class="form__text">
                <a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
            </p>
        </form>
    </div>
   
    <script src="./src/main.js"></script>
</body>


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
        <form class="form" id="login" onsubmit="return validation()" action="login_handler.php" method="post" >
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" placeholder="email" name="email">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" name="login">Continue</button>
            <p class="form__text">
                <a class="form__link" href="./" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>
        </form>
        <form class="form form--hidden" id="createAccount" onsubmit="return validation()" action="register_handler.php" method="post">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="signupFirstname" class="form__input"  name="firstName">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  name="lastName">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  name="email">
                <div class="form__input-error-message"></div>
            </div>
            
            <button class="form__button" type="submit" namr="login">Continue</button>
            <p class="form__text">
            <a href="skill.php">after registration plz chick hrer to select ur skills</a>
            </p>
            
            <p class="form__text">
                <a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
            </p>
        </form>
    </div>
    <script src="./src/main.js"></script>
</body>

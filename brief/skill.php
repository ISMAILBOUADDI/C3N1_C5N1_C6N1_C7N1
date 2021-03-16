<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/main.css">

</head>
<body>
<div class="container">
        <form class="form" onsubmit="return validation()" action="skill_handler.php"  method="post" >
            <h1 class="form__title">details about skills</h1>
            <h3>select your level from 0 to 5 and put -1 if wax unknouwn</h3>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" placeholder="html" name="html">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text"  class="form__input"  placeholder="cgi"  name="cgi">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  placeholder="js"  name="js">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input" placeholder= " ajax "  name="ajax">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  placeholder= "php"  name="php">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" namr="login">Continue</button>
        </form>
    </div>
    
</body>
</html>
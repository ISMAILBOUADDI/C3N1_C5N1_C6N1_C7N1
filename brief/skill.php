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
      <form class="form"  action='skill_handler.php' method='POST'>
            <h1 class="form__title">details about skills</h1>
            <h3>select your level from 0 to 5 and put -1 if was unknouwn</h3>
            <!-- <div class="form__message form__message--error"></div> -->
            <div class="form__input-group">
                <input type="number" class="form__input" placeholder="html" name="html" onkeyup="this.value = minMaxvalidationFunc(this, this.value)" min="-1" max="5"/>
            </div>
            
            <div class="form__input-group">
                <input type="text"  class="form__input" placeholder="cgi"  name="cgi" onkeyup="this.value = minMaxvalidationFunc(this, this.value)" min="-1" max="5"/>
                
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  placeholder="js"  name="js"  onkeyup="this.value = minMaxvalidationFunc(this, this.value)" min="-1" max="5"/>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input" placeholder= " ajax "  name="ajax"  onkeyup="this.value = minMaxvalidationFunc(this, this.value)" min="-1" max="5"/>
            </div>
            <div class="form__input-group">
                <input type="text" class="form__input"  placeholder= "php"  name="php"  onkeyup="this.value = minMaxvalidationFunc(this, this.value)" min="-1" max="5"/>
            </div>
            <input class='bouton' type='submit' name='submit' value='submit'>
            <p class="form__text">
                <a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
            </p>

        </form>
    </div>
    <script>
        function minMaxvalidationFunc(that,value){
let min = parseInt(that.getAttribute("min"));
let max = parseInt(that.getAttribute("max"));
let val = parseInt(value);
if(val<min){
    return min;
}
else if(val>max){
    return max;
}
else if(isNaN(val)){
    return empty;
}
else{
    return val;
}
}
  </script>

</body>
</html>
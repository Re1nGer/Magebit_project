<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Assets/styles/style.css">
    <title>Subscription page</title>
</head>
<script defer src= 'Assets/javascript/input_validation.js'></script>
<body>
<div class="first-half">
    <nav>
        <div class="pineapple-left">  
            <div class="pineapple"></div>
            <a href="#">pineapple.</a>
            </div>
      <ul class="links">
        <li><a href="#">About</a></li>
        <li><a href="#">How it works</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <main>
    <div class="subscribe">
        <div class="title-1">Subscribe to newsletter</div>
        <div class="title-2">
            <p>Subscribe to our newsletter and get 10% discount on pineapple glasses</p>
        </div>
        <form autocomplete = "off" action = "/post" method ="POST" id ="form">
        <div class="wrapper">
          <div class="input-wrapper">
            <input value = "<?php echo htmlspecialchars($_POST['email-input'] ?? '')?>" name = "email-input" id="input-validation" type="text" placeholder="Type your email address here ..." required/>
          </div>
          <button name = 'submit' type = "submit" class="icon-ic_arrow"></button>
        </div>
        <small id = "message"><?php echo $errors['email-input'] ?? $errors['termsOfService'] ?? "" ?></small>
        <div class="checkbox-container">
        <label class="container">
          <input name ="termsOfService" id = 'input-box' type="checkbox" required/>
          <span class="checkmark"></span>
        </label>
        <input id="submit" type="submit">
        </form>
        <div class="terms-services"> I agree to <u>terms of service</u></div>
      </div>
        
      <hr/>
      <div class="social-buttons">
          <div id="facebook" class="social-button"><span class="icon-ic_facebook"></span></div>
          <div id="instagram" class="social-button"><span class="icon-ic-instagram"></span></div>
          <div id="twitter" class="social-button"><span class="icon-ic_twitter"></span></div>
          <div id="youtube" class="social-button"><span class="icon-ic-youtube"></span></div>
      </div> 
      </div>
    </div>
      <div class="second-half"></div>
    </main>
</body>
</html>
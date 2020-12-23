      <div class="subscribe">
        <div class="title-1">Subscribe to newsletter</div>
        <div class="title-2">
            <p>Subscribe to our newsletter and get 10% discount on pineapple glasses</p>
        </div>
        <form autocomplete = "off" action = "<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST" id ="form">
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
        
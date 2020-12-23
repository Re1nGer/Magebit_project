<?php 
    require 'Classes/database.class.php'; 
    require 'Classes/emailValidation.class.php'; 

    $title = 'Home';
    $childView = 'Views/_index.php';
    $javascriptFile = "Assets/javascript/input_validation.js"; 
    $db = new database(); 
  
    if(isset($_POST['submit'])) {
      $validation = new emailValidation($_POST);
      $errors = $validation->validateForm();
      if(empty($errors)) {
        $db->insertRecord($_POST['email-input']);
        $title = "successful_page"; 
        $childView = 'Views/_successful_page.php'; 
        $javascriptFile = '';
      } 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Assets/styles/style.css">
    <title><?php echo $title; ?></title>
</head>
<script defer src=<?php echo $javascriptFile ?>></script>
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
    <?php include($childView) ?>
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
<?php
    require 'config.php';  
    require 'Classes/database.class.php'; 
    require 'Classes/emailValidation.class.php'; 

    $title = 'Home';
    $childView = 'Views/_index.php';
    $db = new database($pdo); 
  
    if(isset($_POST['submit'])) {
      $validation = new emailValidation($_POST);
      $errors = $validation->validateForm();
      if(empty($errors)) {
        $db->insertRecord($_POST['email-input']);
        $title = "successful_page"; 
        $childView = 'Views/_successful_page.php'; 
        
      } 
    } 
  
?>

<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Assets/styles/style.css">
    <title><?php echo $title; ?></title>
</head>
<script defer src="Assets/javascript/input_validation.js"></script>
<body>
    <?php include($childView); ?>
</body>
</html>
<?php
    require_once 'config.php'; 
    require_once 'Classes/database.class.php'; 

    $db = new database($pdo); 
    $id = (($_POST['id']) ?? ''); 
    $db->deleteRecord($id); 

    $pdo = null;
?>
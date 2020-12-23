<?php
    require_once 'Classes/database.class.php'; 

    $db = new database(); 
    $id = (($_POST['id']) ?? ''); 
    $db->deleteRecordById($id); 

    $pdo = null;
?>
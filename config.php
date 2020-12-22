<?php 
    $host = 'localhost:3307'; 
    $db_name = 'magebit_project'; 
    $db_username = 'bek'; 
    $db_password = 'test1234'; 
    

    try{
        $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password); 
    } 
    catch (PDOException $e) {
        exit('Error Connection' . $e->getMessage()); 
    }


  
?>
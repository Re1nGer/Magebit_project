<?php 
require_once 'database.class.php';
require_once 'Validation.class.php';

    class router {
        function __construct() {
            $this->resolve();
        }

       private function resolve() {
            if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/table') {
               include './Views/table.php';
               return;  
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/table/deleteRecord') {
                $db = new database();
                $id = ($_POST['id']); 
                $db->deleteRecordById($id);
                include './Views/table.php';
                return;
                
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/table/search') {
                $db = new database();
                $soughtProvider = $_POST['search']; 
                $db->getByProviderName($soughtProvider);
		        include "Views/table.php";
		        return;
            }
            
            if($_SERVER['REQUEST_METHOD'] === "GET") {
               include './Views/subscription_page.php';
               return;
            } 

            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/post') {
                $db = new database(); 
                $validation = new Validation($_POST);
		        $errors = $validation->validateForm(); 
		        if(!empty($errors)) {
			    	include './Views/subscription_page.php'; 
			    } else {
			        $db->insertRecord($_POST['email-input']); 
			        include './Views/successful_page.php';	
                }
                return;
            }
        }
    }
?>
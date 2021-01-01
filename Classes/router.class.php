<?php 
require_once 'database.class.php';
require_once 'Validation.class.php';


    class router {
      private $requests;


        function __construct() {
            $this->resolve();
        }

       private function resolve() {
        $requests = ['/table' => 'table', '/' => 'getSubscriptionPage', 
        '/post' => 'postSubscription', '/table/deleteRecord' => 'tableDeleteRecord', '/table/search' => 'tableSearch'];

        foreach($requests as $request => $func) {
            call_user_func(array($this, $func));
             }
        }

        private function table() {
            if($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/table') {
                include './Views/table.php';
                return;  
             }
        }

        private function tableDeleteRecord() {
            if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/table/deleteRecord') {
                $db = new database();
                $id = ($_POST['id']); 
                $db->deleteRecordById($id);
                include './Views/table.php';
                return;
            }
        }

         private function postSubscription() {
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

       private function getSubscriptionPage() {
        if($_SERVER['REQUEST_METHOD'] === "GET" && $_SERVER['REQUEST_URI'] === '/') {
            include './Views/subscription_page.php';
            return;
         } 
       }     

      private function tableSearch() {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/table/search') {
            $db = new database();
            $soughtProvider = $_POST['search']; 
            $db->getByProviderName($soughtProvider);
            include "Views/table.php";
            return;
        }
      } 

    }
    
?>
<?php 
    include ('constants.php'); 
    class database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $name = DB_NAME;
        private $pdo;

        function __construct() { 

            try{
                $this->pdo = new PDO('mysql:host='. $this->host .';dbname='. $this->name, $this->user, $this->pass); 
            } 
            catch (PDOException $e) {
                exit('Error Connection' . $e->getMessage()); 
            }        
        }

       public function getAllRecords() {
            $query = $this->pdo->prepare('SELECT * FROM email_subscriptions ORDER BY id'); 
            $query->execute(); 
            return $query->fetchAll(); 
        }

       public function deleteRecordById($id) {
            $query = $this->pdo->prepare('DELETE FROM email_subscriptions WHERE id =:id'); 
            $query->bindParam(':id', $id); 
            $query->execute(); 
        }

       public function insertRecord($email) {
            $name_domain = explode('@', $email);
            $domain = '@'.$name_domain[1];  
            $query = "INSERT INTO email_subscriptions(email, provider) VALUES(?,?)";
            $statement = $this->pdo->prepare($query); 
            $statement->execute([$email, $domain]);  
        }

        public function getDistinctProviders() {
            $query = $this->pdo->prepare('SELECT DISTINCT provider from email_subscriptions ORDER BY id'); 
            $query->execute(); 
            return $query->fetchAll();
        }
    }
?>
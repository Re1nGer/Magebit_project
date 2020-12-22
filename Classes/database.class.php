<?php 
    class database {
        function __construct($pdo) {
            $this->pdo = $pdo; 
        }

       public function getData() {
            $query = $this->pdo->prepare('SELECT * FROM email_subscriptions ORDER BY id'); 
            $query->execute(); 
            return $query->fetchAll(); 
        }

       public function deleteRecord($id) {
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
    }
?>
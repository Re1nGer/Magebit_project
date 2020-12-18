<?php
    include("connection.php"); 
    
    if(isset($_GET['provider_data'])) {
        $sql = 'SELECT * FROM email_subscriptions'; 
        $provider_data = mysqli_query($conn, $sql); 

        $response = array(); 

        while($row = mysqli_fetch_assoc($provider_data)) {
            $response[] = array(
                "id" => $row['id'],
                "email" => $row['email'],
                "provider" => $row['provider'],

            ); 
        }
        echo json_encode($response);
    }
    mysqli_close($conn); 
?>
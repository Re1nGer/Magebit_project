<?php
    include("connection.php"); 

    $id = (isset($_POST['id']) ? $_POST['id'] : ''); 
    
    $sql = "DELETE FROM email_subscriptions where id ='" . $id ."'"; 
    if(mysqli_query($conn, $sql)) {
        echo "Record deleted successfully"; 
    }  else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
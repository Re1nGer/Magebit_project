<?php
    $conn = mysqli_connect('localhost:3307', 'bek', 'test1234', 'magebit_project');
    if(!$conn) {
        echo "connection error " . mysqli_connect_error($conn); 
    }
?>
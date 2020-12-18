<?php
    include("connection.php"); 

    $sql = 'SELECT * FROM email_subscriptions ORDER BY id'; 
    
    $result = mysqli_query($conn, $sql); 

    $emails = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    mysqli_free_result($result); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script defer src = "javascript/table.js"></script>
<body>
<table id = "table">
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Provider</th>
        <th>Delete</th>
    </tr>
    <tbody>
    <tr>
    <?php foreach($emails as $email){?>
        <td><?php echo htmlspecialchars($email['id']) ?></td>
        <td><?php echo htmlspecialchars($email['email']) ?></td>
        <td><?php echo htmlspecialchars($email['provider']) ?></td>
        <td><button id = "delete" data-id="<?php echo $email['id'];?>">X</button></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<div id = "button_provider">

</div>
<div>
    <input id = "search" type = "text">
</div>
    
</body>
</html>
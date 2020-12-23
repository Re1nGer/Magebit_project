<?php 
    require_once 'Classes/database.class.php'; 
    $db = new database(); 
    $data = $db->getAllRecords();  
    $distinctProviders = $db->getDistinctProviders(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script defer src = "Assets/javascript/table.js"></script>
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
    <?php foreach($data as $email){?>
        <td><?php echo htmlspecialchars($email['id']) ?></td>
        <td><?php echo htmlspecialchars($email['email']) ?></td>
        <td><?php echo htmlspecialchars($email['provider']) ?></td>
        <td><button id = "delete" data-id="<?php echo $email['id'];?>">X</button></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<div id = "button_provider">
    <?php foreach($distinctProviders as $email){?>
    <button><?php echo htmlspecialchars($email['provider']) ?></button>
    <?php }?>

</div>
<div>
    <input id = "search" type = "text">
</div>
    
</body>
</html>
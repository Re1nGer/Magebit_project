<?php 
    require_once 'Classes/database.class.php'; 
    $db = new database(); 
    $data = $db->getAllRecords();  
    $distinctProviders = $db->getDistinctProviders(); 
    $searchByProviderName = $db->getByProviderName($_POST['search'] ?? "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    <?php foreach($searchByProviderName ?? $data as $email){?>
        <td><?php echo htmlspecialchars($email['id']) ?></td>
        <td><?php echo htmlspecialchars($email['email']) ?></td>
        <td><?php echo htmlspecialchars($email['provider']) ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<div id = "button_provider">
    <?php foreach($distinctProviders as $email){?>
    <button><?php echo htmlspecialchars($email['provider']) ?></button>
    <?php }?>

</div>
<form action = "/table/search" method = "POST" >
    <label for = "search">Search</label>
    <input name = "search" id = "search" type = "text">
    <button type = "submit">Search</button>
</form>

<form action = "/table/deleteRecord" method = "POST">
<label for = "delete">Delete</label>
    <input id = "delete" type = "text">
    <button type = "submit">Delete</button>
</form>

    
</body>
</html>
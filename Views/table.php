<?php 
    require_once 'Classes/database.class.php'; 
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
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Provider</th>
        <th>Date</th>
    </tr>
    <tbody>
    <tr>
    <?php foreach($nameFirst ?? $searchByProviderName ?? $data as $email){?>
        <td><?php echo htmlspecialchars($email['id']) ?></td>
        <td><?php echo htmlspecialchars($email['email']) ?></td>
        <td><?php echo htmlspecialchars($email['provider']) ?></td>
        <td><?php echo htmlspecialchars($email['Date']) ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
<div>
    <?php foreach($distinctProviders as $email){?>
      <button name = "search" type = "submit" form = "searchByButton" value ="<?php echo htmlspecialchars($email['provider']) ?>"><?php echo htmlspecialchars($email['provider']) ?></button>
    <?php }?>
</div>

<form action = "/table/search" method = "POST" id="search">
    <label for = "search">Search</label>
    <input name = "search" id = "search" type = "text">
    <button type = "submit">Search By Provider Name</button>
</form>

<form action = "/table/deleteRecord" method = "POST">
<label for = "delete">Delete</label>
    <input name = "id" id = "delete" type = "text">
    <button type = "submit">Delete By Id</button>
</form>

<form action = "/table/search" method = "POST" id="searchByButton" />
<button><a href = "/table">Show All Records</a></button>

<button form = "searchByButton" name = "sortByName" type = "submit">Sort by Name</button>

</body>
</html>
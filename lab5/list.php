<?php

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        
        <a href="index.php?id=1">index.php</a>
        <a href="create.php">create.php</a>
        <a href="update.php">update.php</a>
        <a href="delete.php">delete.php</a>
        <a href="log_in.php">log_in.php</a>
        <a href="log_out.php">log_out.php</a>
       
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        $name = $_POST['name'];
        foreach ($xml->item as $item) {
          
            if (strcmp($item->name, $name) === 0 && strcmp($item->password, $password) === 0) {
                $item->online = 1;
                header('location:index.php?id=' . strval( $item['id']));
                
                break;
            }
        }

        $xml->saveXML('data.xml');
    }
    ?>

    <form method="POST" action="log_in.php">
        Имя пользователя: <input type="text" name="name" required /><br />
        Пароль: <input type="text" name="password" /><br />
        <input type="submit" value="Войти" />
    </form>
    
</body>

</html>
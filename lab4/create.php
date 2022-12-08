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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $workplace = $_POST['workplace'];
        $online = 0;

        $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
        
        $task = $xml->addChild('item', '');
        $task->addChild('workplace', $workplace);
        $task->addChild('name', $name);
        $task->addChild('password', $password);
        $task->addChild('status', $status);
        $task->addChild('online', 0);
        $task->addAttribute('id', $xml->count());

        $xml->saveXML('data.xml');
    }
    ?>
    <form method="POST" action="create.php">
        Имя пользователя: <input type="text" name="name" required /><br />
        Пароль: <input type="text" name="password" /><br />
        Статус: <input type="text" name="status" /><br />
        Место работы: <input type="text" name="workplace" /><br />
        <input type="submit" value="Сохранить" />
    </form>
</body>

</html>
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
    $id = 0;
    $name = '';
    $password = '';
    $status = '';
    $workplace = '';

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $name = $item->name;
                $password = $item->password;
                $status = $item->status;
                $workplace = $item->workplace;
                $node = $item;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->name = $_POST['name'];
                $item->password = $_POST['password'];
                $item->status = $_POST['status'];
                $item->workplace = $_POST['workplace'];
                break;
            }
        }
        $xml->saveXML('data.xml');
    }
    ?>

    <form method="POST" action="update.php?id=<?= $id ?>">
        Имя пользователя: <input type="text" name="name" required value="<?= $name ?>" /><br />
        Пароль: <input type="text" name="password" value="<?= $password ?>"/><br />
        Статус: <input type="text" name="status" value="<?= $status ?>" /><br />
        Место работы: <input type="text" name="workplace" value="<?= $workplace ?>" /><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
        <input type="submit" value="Сохранить" />
        <a href="delete.php?id=<?= $item['id']?>">Удалить</a>
    </form>
</body>

</html>
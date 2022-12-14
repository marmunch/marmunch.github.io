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
        
        $conn = new mysqli("localhost", "root", "", "social_site");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
        $name = $conn->real_escape_string($_POST["name"]);
        $password = $conn->real_escape_string($_POST["password"]);
        $status = $conn->real_escape_string($_POST["status"]);
        $workplace = $conn->real_escape_string($_POST["workplace"]);
        $sql = "INSERT INTO account (name, password, status, workplace) VALUES ('$name', '$password', '$status', '$workplace')";
        if($conn->query($sql)){
            echo "Данные успешно добавлены";
        } else{
            echo "Ошибка: " . $conn->error;
        }
        $conn->close();
    }

    /*
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $workplace = $_POST['workplace'];
        $online = 0;

        $result = mysqli_query($link, 'INSERT INTO account SET name = ' . $name);
        $result = mysqli_query($link, 'INSERT INTO account SET password = ' . $password);
        $result = mysqli_query($link, 'INSERT INTO account SET status = ' . $status);
        $result = mysqli_query($link, 'INSERT INTO account SET workplace = ' . $workplace);
        
        //$task = $xml->addChild('item', '');
        //$task->addChild('workplace', $workplace);
        //$task->addChild('name', $name);
        //$task->addChild('password', $password);
        //$task->addChild('status', $status);
        //$task->addChild('online', 0);
        //$task->addAttribute('id', $xml->count());

    }*/
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
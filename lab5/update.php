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

    $conn = new mysqli("localhost", "root", "", "social_site");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])){

        $userid = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM account WHERE id = '$userid'";
        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                foreach($result as $row){
                    $name = $row["name"];
                    $password = $row["password"];
                    $status = $row["status"];
                    $workplace = $row["workplace"];
                    echo "<td><form action='delete.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' value='Удалить'>
                    </form></td>";
            
                }
            }
            else{
                echo "<div>Пользователь не найден</div>";
            }
            $result->free();
        } else{
            echo "Ошибка: " . $conn->error;
        }
    }
    elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $userid = $conn->real_escape_string($_POST["id"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $password = $conn->real_escape_string($_POST["password"]);
        $status = $conn->real_escape_string($_POST["status"]);
        $workplace = $conn->real_escape_string($_POST["workplace"]);
        $sql = "UPDATE account SET name = '$name', password = '$password', status = '$status', workplace = '$workplace'  WHERE id = '$userid'";
        if($result = $conn->query($sql)){
            header("Location: update.php");
        } else{
            echo "Ошибка: " . $conn->error;
        }
    }
    else {
        echo "Некорректные данные";
    }
    $conn->close();

    /*$id = 0;
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
    }*/
    ?>

    <form method="POST" action="update.php?id=<?= $userid ?>">
        Имя пользователя: <input type="text" name="name" required value="<?= $name ?>" /><br />
        Пароль: <input type="text" name="password" value="<?= $password ?>"/><br />
        Статус: <input type="text" name="status" value="<?= $status ?>" /><br />
        Место работы: <input type="text" name="workplace" value="<?= $workplace ?>" /><br />
        <input type="hidden" value="<?= $userid ?>" name="id"/>
        <input type="submit" value="Сохранить" />
    </form>
</body>

</html>
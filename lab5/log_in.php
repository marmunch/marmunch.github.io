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

        $password = $_POST['password'];
        $name = $_POST['name'];

        $sql = "SELECT * FROM account";
        if($result = $conn->query($sql)){
            foreach($result as $row){
                if (strcmp($row['name'], $name) === 0 && strcmp($row['password'], $password) === 0) {
                    $row['online'] = 1;
                    header('location:index.php?id=' . strval( $row['id']));
                }
            } 
        }
        
        $result->free();
        $conn->close();
        }
    ?>

    <form method="POST" action="log_in.php">
        Имя пользователя: <input type="text" name="name" required /><br />
        Пароль: <input type="text" name="password" /><br />
        <input type="submit" value="Войти" />
    </form>
    
</body>

</html>
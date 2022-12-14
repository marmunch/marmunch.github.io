<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = new mysqli("localhost", "root", "", "social_site");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $id = $_GET['id'];

    $sql = "UPDATE account SET online = '0'  WHERE id = '$id'";
    if($conn->query($sql)){
        header("Location: log_in.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
}
?>
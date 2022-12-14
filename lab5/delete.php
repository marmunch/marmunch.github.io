<?php
/*if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
    $id = $_GET['id'];
    $i = 0;
    foreach ($xml->item as $item) {

   
        if ($item['id'] == $id) {
            unset($xml->item[$i]);
            print_r($xml);
            break;
        }

        $i++;
    }
    
    $xml->saveXML('data.xml');
    header('location:update.php');
}?> */

$conn = new mysqli("localhost", "root", "", "social_site");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }

$id = $_POST['id'];        
$sql = "DELETE FROM account WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "Запись успешно удалена";
} else {
  echo "Ошибка при удалении записи: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
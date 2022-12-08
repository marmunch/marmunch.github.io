<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
    $id = $_GET['id'];

    foreach ($xml->item as $item) {
        if (strcmp($id, $item['id']) === 0) {
            $item->online = 0;
            break;
        }        
    }
    
    $xml->saveXML('data.xml');
    header('location:log_in.php');
}
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
    //header('location:update.php');
}
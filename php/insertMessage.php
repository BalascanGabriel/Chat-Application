<?php
require 'database.php';
$vals = array(
    'messages'   => 'daa'
);
header('Content-Type: application/json');      
echo json_encode($vals, JSON_PRETTY_PRINT);
if (isset($_POST["message"])){        
    $database=Database::getInstance("10.0.0.5","root","password");
    $database->insertMessage($_POST['message'],$_POST['data']);
    $vals = array(
        'messages'   => 'inserted'
    );
    header('Content-Type: application/json');      
    echo json_encode($vals, JSON_PRETTY_PRINT);           
}
?>
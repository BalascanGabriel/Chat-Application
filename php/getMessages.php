<?php
require 'database.php';

if(!empty($_GET))
{
    $database=Database::getInstance("10.0.0.5","root","password");
    $vals = array(
        'messages'   => $database->getAllMessages()
    );
    header('Content-Type: application/json');      
    echo json_encode($vals, JSON_PRETTY_PRINT);                                         
}
?>
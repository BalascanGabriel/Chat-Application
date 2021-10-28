<?php
session_start();
require "database.php";
require "app.php";
require "header.php";
require "footer.php";

$components=array(new Header(),new App(),new Footer());
$database=Database::getInstance("10.0.0.5","root","password");
foreach($database->getAllMessages() as $message)
{
    $components[1]->addMessage($message);
}
foreach($components as $component)
    $component->render();

?>
<?php
class Header{
    private $style="";
    private $scripts=array("buttonClick.js");
    public function render()
    {
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<body>";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>";
        foreach($this->scripts as $script)
            echo "<script type=\"text/javascript\" src=\"$script\"></script>";
    }
}
?>
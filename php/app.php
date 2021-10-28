<?php
class App
{
    private $messages=array();
    public function message($message)
    {
        $messageStyle=implode(";",array(
            "color:white",
            "background-color:grey"
        ));
        echo "<h5 style=\"$messageStyle\">$message</h5>";
    }
    public function addMessage($message)
    {
        array_push($this->messages,$message);
    }
    public function render()
    {
        $divStyle=implode(";",array(
        "height:200px",
        "overflow-y:scroll",
        "width:200px",
        "border:2px solid",
        ));
        $inputStyle=implode(";",array(
            "width:160px"
        ));   
        $buttonStyle=implode(";",array(
            "width:40",
        ));
        echo "<div id=\"messages\" style=\"$divStyle\">";
        foreach($this->messages as $mes)
        {
            $this->message($mes);
        }
        echo "</div>";
        echo "<input id=\"inputMessage\" style=\"$inputStyle\"></input>";
        echo "<button style=\"$buttonStyle\" onClick=\"send()\">Send</button>";
    }
}


?>
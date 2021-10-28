<?php
class Database
{
    private $servername;
    private $username;
    private $password;
    private static $instance;
    private $conn;
    private function __construct($servername,$username,$password)
    {
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;
        try
        {
            $this->conn=new PDO("mysql:host=$servername;", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createDatabase("messages");
            $this->createTable();
        }
        catch(PDOException $e) {
            echo $this->servername;
            echo "<br>";
            echo $this->username;
            echo "<br>";
            echo $this->password;
            echo "<br>";
            echo $e->getMessage()."<br>";
            var_dump($this->conn);
        }
    }
    public function getAllMessages()
    {
        $messages=array();
        $data = $this->conn->query("SELECT * FROM mess;")->fetchAll();
        foreach ($data as $row) {
            array_push($messages,$row["message"]);
        }
        return $messages;
    }
    public function insertMessage($message,$date)
    {
        try{
            $sql = "USE messages;INSERT INTO mess (message, date) VALUES ('$message', '$date')";
            if($this->conn)
            {    
                $this->conn->exec($sql);
            }
            else
            {
                echo "Nu exista conexiune la baza de date";
            }
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }     
    }
    public static function getInstance($servername,$username,$password)
    {
        if(!Database::$instance)
        {
            Database::$instance=new Database($servername,$username,$password);
        }
        return Database::$instance;
    }
    private function createTable()
    {
        try{
                $sql="USE messages;
                CREATE TABLE IF NOT EXISTS mess ( id int NOT NULL AUTO_INCREMENT,message varchar(255),date varchar(255),
                PRIMARY KEY (id)
                )";
                if($this->conn)
                {    
                    $this->conn->exec($sql);
                    //echo "Table created successfully<br>";
                }
                else
                {
                    echo "Nu exista conexiune la baza de date";
                }
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }     
    }
    private function createDatabase($dbName)
    {
        try{
            $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
            if($this->conn)
            {    
                $this->conn->exec($sql);
                 //echo "Database created successfully<br>";
            }
            else
            {
                echo "Nu exista conexiune la baza de date";
            }
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }  
    }
}
?>
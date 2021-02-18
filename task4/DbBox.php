<?php

require_once("AbstractBox.php");

class DbBox extends BoxAbstract
{
    
    private static $instance;
 
    private function __construct() { }
    
    private function __clone() { }

    private function __wakeup() { }
    
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function save()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'Test');
        $query = "INSERT INTO task4 (MyKey,MyValue) VALUES ";
        $tempStr = "";
        foreach ($this->data as $key => $value) {
            $tempValue = is_array($value) ? implode(",", $value) : $value;
            $tempStr .= "('".$key."','".$tempValue."'),";
        }
        $tempStr = substr($tempStr, 0, -1);
        $query .= $tempStr;
        $query .=" ON DUPLICATE KEY UPDATE MyValue=VALUES(MyValue);";
        $result = $mysqli->query($query);
    }
 
    public function load()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'Test');
        $result = $mysqli->query("SELECT MyKey, MyValue FROM task4;");
        $this->data = [];
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $this->data[$row["MyKey"]] = $row["MyValue"];
        }
    }
}
?>
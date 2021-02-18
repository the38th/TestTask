<?php

require_once("AbstractBox.php");

class FileBox extends BoxAbstract
{
    private $file = "test.txt";
    
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
        $array = unserialize(file_get_contents($this->file));
        if (is_array($array)) {
            $this->data = array_replace($array, $this->data);
        }
        file_put_contents($this->file, serialize($this->data));
    }
 
    public function load()
    {
        $this->data = unserialize(file_get_contents($this->file));
    }
    
}
?>
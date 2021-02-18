<?php

require_once("Box.php");

abstract class BoxAbstract implements Box
{
    protected $data = [];
 
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }
 
    public function getData($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        return null;
    }
    
    public abstract function save();
    public abstract function load();
}

?>
<?php

claSS ArrayManipulator
{
    private $data = [];

    public function __get($name){
        return $this->data[$name];
    }

    public function __set($name, $value){
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        if (isset($this->data[$name])) {
            unset($this->data[$name]);
        }
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function __clone()
    {
        echo "Copying object <br>";
    }
}

?>
<?php 

class Model
{

    private $values = [];

    public function __call($name, $args)
    {
        $method = substr($name, 0, 3);
        $lastName = substr($name, 3, strlen($name));
        switch($method)
        {
            case 'get':
                return isset($this->values[$lastName])? $this->values[$lastName]:NULL;
                break;
            
            case 'set':
                $this->values[$lastName] = $args;
                break;

        }

    }

    public function setData($data = array())
    {
        foreach($data as $index => $element)
        {
            $this->{'set'.$index}{$element};
        }

    }

    public function getValues()
    {
        return $this->values;
    }

}



?>
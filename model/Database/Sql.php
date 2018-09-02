<?php 

namespace Database;

class Sql extends \Model
{

    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO('mysql:dbname=crud_php;host=localhost', 'root', '');
    }

    private static function setParameters($standBy, $parameters = array())
    {
    
        foreach($parameters as $index => $element)
        {
            Sql::setParameter($standBy, $index, $element);
        }
    }

    private static function setParameter($standBy, $index, $element)
    {
        $standBy->bindParam($index, $element);
    }

    public function query($query, $parameters = array())
    {
        $standBy = $this->connection->prepare($query);
        Sql::setParameters($standBy, $parameters);
        $standBy->execute();
        return $standBy;

    }

    public function select($query, $parameters = array()):array
    {

        $standBy = $this->query($query, $parameters);
        return $standBy->fetchAll(\PDO::FETCH_ASSOC);

    }

}


?>
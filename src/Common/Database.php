<?php

class Database
{

    use SingletonTrait;
    private PDO $db;
    protected function __construct()
    {
        $this->db=new PDO();

    }
            static public function get(): PDO
        {
            return self::getInstance()->db;
        }

}
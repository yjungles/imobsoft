<?php

class Database
{

    protected $db;
    function __construct()
    {
        $this->openDatabaseConnection();
    }

    private function openDatabaseConnection()
    {
        try {
            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
            $this->db = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME,   DB_USER, DB_PASS, $opcoes);
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
}

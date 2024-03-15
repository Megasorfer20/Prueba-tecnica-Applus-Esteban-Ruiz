<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once "database.php";

abstract class Conection
{
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = new PDO(DBTYPE . ":host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}

?>
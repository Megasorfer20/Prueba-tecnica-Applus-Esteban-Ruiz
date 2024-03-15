<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once "../database/conection.php";

class Category extends Conection
{
    private $id;
    private $name;
    private $createdAt;
    private $updatedAt;
    protected $dbcnx;

    public function __construct(
        $id = 0,
        $name = "",
        $createdAt = "",
        $updatedAt = "",
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        parent::__construct();
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getCreatedAt()
    {
        return $this->createdAt;
    }

    function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

}


?>
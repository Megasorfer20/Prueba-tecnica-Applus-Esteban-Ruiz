<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once "../database/conection.php";

class Products extends Conection
{
    private $id;
    private $code;
    private $name;
    private $category;
    private $price;
    private $createdAt;
    private $updatedAt;
    protected $dbcnx;

    public function __construct(
        $id = 0,
        $code = "",
        $name = "",
        $category = "",
        $price = "",
        $createdAt = "",
        $updatedAt = "",
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        parent::__construct();
    }

    function getId()
    {
        return $this->id;
    }

    function getCode()
    {
        return $this->code;
    }

    function getName()
    {
        return $this->name;
    }

    function getCategory()
    {
        return $this->category;
    }

    function getPrice()
    {
        return $this->price;
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

    function setCode($code)
    {
        $this->code = $code;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setCategory($category)
    {
        $this->category = $category;
    }

    function setPrice($price)
    {
        $this->price = $price;
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
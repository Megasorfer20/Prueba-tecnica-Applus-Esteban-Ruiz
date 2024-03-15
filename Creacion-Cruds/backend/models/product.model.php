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
        $createdAt = null,
        $updatedAt = null,
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

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function obtainAll()
    {
        try {
            $stm = $this->dbcnx->prepare("SELECT * FROM product");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function obtainOne()
    {
        try {
            $stm = $this->dbcnx->prepare("SELECT * FROM product WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function insertOne()
    {
        try {
            $stm = $this->dbcnx->prepare("INSERT INTO product (code, name, category, price, createdAt, updatedAt) values (?,?,?,?,?,?)");
            $stm->execute([$this->code, $this->name, $this->category, $this->price, $this->createdAt, $this->updatedAt]);
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function delete()
    {
        try {
            $stm = $this->dbcnx->prepare("DELETE FROM product WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbcnx->prepare("UPDATE product SET code = ?, name = ?, category = ?, price = ?, updatedAt = ? WHERE id = ?");
            $stm->execute([$this->code, $this->name, $this->category, $this->price, $this->updatedAt, $this->id]);
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }
}

?>
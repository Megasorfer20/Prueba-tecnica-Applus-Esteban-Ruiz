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

    public function __construct(
        $id = 0,
        $name = "",
        $createdAt = "",
        $updatedAt = null,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        parent::__construct();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
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

    public function setName($name)
    {
        $this->name = $name;
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
            $stm = $this->dbcnx->prepare("SELECT * FROM category");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function obtainOne()
    {
        try {
            $stm = $this->dbcnx->prepare("SELECT * FROM category WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function insertOne()
    {
        try {
            $stm = $this->dbcnx->prepare("INSERT INTO category (name, createdAt, updatedAt) values (?,?,?)");
            $stm->execute([$this->name, $this->createdAt, $this->updatedAt]);
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function delete()
    {
        try {
            $stm = $this->dbcnx->prepare("DELETE FROM category WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbcnx->prepare("UPDATE category SET name = ?, updatedAt = ? WHERE id = ?");
            $stm->execute([$this->name, $this->updatedAt, $this->id]);
        } catch (Exception $errorXD) {
            return $errorXD->getMessage();
        }
    }

}


?>
<?php
// create class Category and public function insertCategory, updateCategoryById, deleteCategoryById, getCategoryAll, getCategoryById
class Category
{
    public $categoryId;
    public $categoryName;

    private $conn_db;

    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    public function insertCategory()
    {
        $strSQL = "INSERT INTO category_tb (categoryName) VALUES (:categoryName)";
        $stat = $this->conn_db->prepare($strSQL);
        $this->categoryName = htmlspecialchars(stripcslashes(strip_tags($this->categoryName)));
        $stat->bindParam(":categoryName", $this->categoryName);
        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory()
    {
        $strSQL = "UPDATE category_tb SET categoryName=:categoryName WHERE categoryId=:categoryId";
        $stat = $this->conn_db->prepare($strSQL);
        $this->categoryName = htmlspecialchars(stripcslashes(strip_tags($this->categoryName)));
        $this->categoryId = intval(htmlspecialchars(stripcslashes(strip_tags($this->categoryId))));
        $stat->bindParam(":categoryName", $this->categoryName);
        $stat->bindParam(":categoryId", $this->categoryId);
        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory()
    {
        $strSQL = "DELETE FROM category_tb WHERE categoryId=:categoryId";
        $stat = $this->conn_db->prepare($strSQL);
        $this->categoryId = intval(htmlspecialchars(stripcslashes(strip_tags($this->categoryId))));
        $stat->bindParam(":categoryId", $this->categoryId);
        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategory()
    {
        $strSQL = "SELECT * FROM category_tb";
        $stat = $this->conn_db->prepare($strSQL);
        $stat->execute();
        return $stat;
    }

    public function getCategoryById()
    {
        $strSQL = "SELECT * FROM category_tb WHERE categoryId=:categoryId";
        $stat = $this->conn_db->prepare($strSQL);
        $this->categoryId = intval(htmlspecialchars(stripcslashes(strip_tags($this->categoryId))));
        $stat->bindParam(":categoryId", $this->categoryId);
        $stat->execute();
        return $stat;
    }
}

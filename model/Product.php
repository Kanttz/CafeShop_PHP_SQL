<?php
class Product
{
    public $productId;
    public $productName;
    public $productPrice;
    public $categoryId;

    private $conn_db;

    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    // create 5 function insertProduct, updateProductById, deleletProductById, getAllProduct, getProductById
    public function insertProduct()
    {
        $strSQL = "INSERT INTO product_tb (productName, productPrice, categoryId) VALUES (:productName, :productPrice, :categoryId)";
        $stat = $this->conn_db->prepare($strSQL);

        $this->productName = htmlspecialchars(stripcslashes(strip_tags($this->productName)));
        $this->productPrice = htmlspecialchars(stripcslashes(strip_tags($this->productPrice)));
        $this->categoryId = intval(htmlspecialchars(stripcslashes(strip_tags($this->categoryId))));

        $stat->bindParam(":productName", $this->productName);
        $stat->bindParam(":productPrice", $this->productPrice);
        $stat->bindParam(":categoryId", $this->categoryId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProductById()
    {
        $strSQL = "UPDATE product_tb SET productName=:productName, productPrice=:productPrice, categoryId=:categoryId WHERE productId=:productId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->productName = htmlspecialchars(stripcslashes(strip_tags($this->productName)));
        $this->productPrice = htmlspecialchars(stripcslashes(strip_tags($this->productPrice)));
        $this->categoryId = intval(htmlspecialchars(stripcslashes(strip_tags($this->categoryId))));
        $this->productId = intval(htmlspecialchars(stripcslashes(strip_tags($this->productId))));

        $stat->bindParam(":productName", $this->productName);
        $stat->bindParam(":productPrice", $this->productPrice);
        $stat->bindParam(":categoryId", $this->categoryId);
        $stat->bindParam(":productId", $this->productId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProductById()
    {
        $strSQL = "DELETE FROM product_tb WHERE productId=:productId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->productId = intval(htmlspecialchars(stripcslashes(strip_tags($this->productId))));

        $stat->bindParam(":productId", $this->productId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllProduct()
    {
        $strSQL = "SELECT * FROM product_tb";
        $stat = $this->conn_db->prepare($strSQL);
        $stat->execute();
        return $stat;
    }

    public function getProductById()
    {
        $strSQL = "SELECT * FROM product_tb WHERE productId=:productId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->productId = intval(htmlspecialchars(stripcslashes(strip_tags($this->productId))));

        $stat->bindParam(":productId", $this->productId);

        $stat->execute();
        return $stat;
    }
}

// Q: how to push this project to github aga
// A: git init
//    git add .
//    git commit -m "first commit"
//    git remote add origin
//    git push -u origin master

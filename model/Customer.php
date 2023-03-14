<?php
class Customer
{
    public $customerId;
    public $customerName;
    public $customerPhone;

    private $conn_db;

    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    // create public function insertCustomer, updateCustomerById, deleletCustomerById, getCustomerAll, getCustomerById
    public function insertCustomer()
    {
        $strSQL = "INSERT INTO customer_tb (customerName, customerPhone) VALUES (:customerName, :customerPhone)";
        $stat = $this->conn_db->prepare($strSQL);

        $this->customerName = htmlspecialchars(stripcslashes(strip_tags($this->customerName)));
        $this->customerPhone = htmlspecialchars(stripcslashes(strip_tags($this->customerPhone)));

        $stat->bindParam(":customerName", $this->customerName);
        $stat->bindParam(":customerPhone", $this->customerPhone);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCustomerById()
    {
        $strSQL = "UPDATE customer_tb SET customerName=:customerName, customerPhone=:customerPhone WHERE customerId=:customerId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->customerName = htmlspecialchars(stripcslashes(strip_tags($this->customerName)));
        $this->customerPhone = htmlspecialchars(stripcslashes(strip_tags($this->customerPhone)));
        $this->customerId = intval(htmlspecialchars(stripcslashes(strip_tags($this->customerId))));

        $stat->bindParam(":customerName", $this->customerName);
        $stat->bindParam(":customerPhone", $this->customerPhone);
        $stat->bindParam(":customerId", $this->customerId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCustomerById()
    {
        $strSQL = "DELETE FROM customer_tb WHERE customerId=:customerId";
        $stat = $this->conn_db->prepare($strSQL);

        $this->customerId = intval(htmlspecialchars(stripcslashes(strip_tags($this->customerId))));

        $stat->bindParam(":customerId", $this->customerId);

        if ($stat->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCustomer()
    {
        $strSQL = "SELECT * FROM customer_tb WHERE customerId=:customerId";
        $stat = $this->conn_db->prepare($strSQL);
        $this->customerId = intval(htmlspecialchars(stripcslashes(strip_tags($this->customerId))));
        $stat->bindParam(":customerId", $this->customerId);
        $stat->execute();

        return $stat;
    }

    public function getAllCustomer()
    {
        $strSQL = "SELECT * FROM customer_tb";
        $stat = $this->conn_db->prepare($strSQL);
        $stat->execute();

        return $stat;
    }
}

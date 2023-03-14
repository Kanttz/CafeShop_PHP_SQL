<?php
class OrderCoffee
{

    public $productId;
    public $productName;
    public $productPrice;
    public $categoryId;
    // category_tb
    public $categoryName;
    // customer_tb
    public $customerId;
    public $customerName;
    public $customerPhone;
    // order_tb
    public $orderId;
    public $orderTotalPrice;
    public $orderDate;
    // orderdetail_tb
    public $orderdetailId;
    // public $orderId; // ซ้ำกับ order_tb
    // public $productId; // ซ้ำกับ product_tb
    public $orderQuantity;
    public $orderPrice;

    private $conn_db;

    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    // ฟังชั่นบันทึกข้อมูลการสั่งซื้อกาแฟของลูกค้า
    // ทำงาน 2 ตาราง order_tb และ orderdetail_tb
    public function insertOrderCoffee()
    {
        // คำสั่ง SQL บันทึกข้อมูลลงในตาราง order_tb
        $strSQL1 = "INSERT INTO order_tb (orderTotalPrice, orderDate, customerId) VALUES (:orderTotalPrice, :orderDate, :customerId)";

        $stat1 = $this->conn_db->prepare($strSQL1);

        $this->orderTotalPrice = floatval(htmlspecialchars(stripcslashes(strip_tags($this->orderTotalPrice))));
        $this->orderDate = date('Y-m-d H:i:s');
        $this->customerId = intval(htmlspecialchars(stripcslashes(strip_tags($this->customerId))));

        $stat1->bindParam(":orderTotalPrice", $this->orderTotalPrice);
        $stat1->bindParam(":orderDate", $this->orderDate);
        $stat1->bindParam(":customerId", $this->customerId);

        if ($stat1->execute()) {
            // บันทึกข้อมูลลงในตาราง order_tb สำเร็จ จึงจะบันทึกข้อมูลลงในตาราง orderdetail_tb
            // แบ่งเป็นสองขั้นตอน คือ 
            // 1. ค้นหาข้อมูล orderId ที่เพิ่งบันทึกลงในตาราง order_tb แล้ว
            // คำสั่ง SQL ค้นหาข้อมูล orderId ที่เพิ่งบันทึกลงในตาราง order_tb
            $strSQL2 = "SELECT orderId FROM order_tb WHERE customerId=" . $this->customerId . " AND orderDate=" . $this->orderDate;
            // สร้างตัวแปร $stat2
            $stat2 = $this->conn_db->prepare($strSQL2);

            $stat2->execute();
            // เข้าถึงข้อมูลที่ได้จากการค้นหา(select) แล้วคือ orderId
            $dataRow = $stat2->fetch(PDO::FETCH_ASSOC);
            extract($dataRow); //จะได้ตัวแปร $orderId โดยอัตโนมัติ
            // 2. บันทึกข้อมูลลงในตาราง orderdetail_tb
            // คำสั่ง SQL บันทึกข้อมูลลงในตาราง orderdetail_tb
            $strSQL3 = "INSERT INTO orderdetail_tb (orderId, productId, orderQuantity, orderPrice) VALUES (:orderId, :productId, :orderQuantity, :orderPrice)";

            $stat3 = $this->conn_db->prepare($strSQL3);

            $this->orderId = $orderId;
            $this->productId = intval(htmlspecialchars(stripcslashes(strip_tags($this->productId))));
            $this->orderQuantity = intval(htmlspecialchars(stripcslashes(strip_tags($this->orderQuantity))));
            $this->orderPrice = floatval(htmlspecialchars(stripcslashes(strip_tags($this->orderPrice))));

            $stat3->bindParam(":orderId", $this->orderId);
            $stat3->bindParam(":productId", $this->productId);
            $stat3->bindParam(":orderQuantity", $this->orderQuantity);
            $stat3->bindParam(":orderPrice", $this->orderPrice);

            if ($stat3->execute()) {
                // บันทึกข้อมูลลงในตาราง orderdetail_tb สำเร็จ
                return 1;
            } else {
                // บันทึกข้อมูลลงในตาราง orderdetail_tb ไม่สำเร็จ
                return -2;
            }
        } else {
            // บันทึกข้อมูลลงในตาราง order_tb ไม่สำเร็จ
            return -1;
        }
    }

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อทั้งหมดโดยเรียงจากล่าสุด
    public function readAllOrderCoffee()
    {
        $strSQL = "SELECT * FROM order_tb a, orderdetail_tb b ORDER BY orderDate DESC WHERE a.orderId=b.orderId";
        $stat = $this->conn_db->prepare($strSQL);
        $stat->execute();
        $dataRow = $stat->fetchAll(PDO::FETCH_ASSOC);
        return $dataRow;
    }


    // ฟังชั่นแสดงข้อมูลการสั่งซื้อรายวัน
    public function readOrderCoffeeByOrderDate()
    {
        $strSQL = "SELECT * FROM order_tb a, orderdetail_tb b WHERE a.orderId=b.orderId AND orderDate=:orderDate";
        $stat = $this->conn_db->prepare($strSQL);
        $this->orderDate = htmlspecialchars(stripcslashes(strip_tags($this->orderDate)));
        $stat->bindParam(":orderDate", $this->orderDate);
        $stat->execute();

        return $stat;
    }

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อรายเดือน
    public function readOrderCoffeeByMonth()
    {
        $strSQL = "SELECT * FROM order_tb a, orderdetail_tb b WHERE a.orderId=b.orderId AND MONTH(orderDate)=:orderDate";
        $stat = $this->conn_db->prepare($strSQL);
        $this->orderDate = htmlspecialchars(stripcslashes(strip_tags($this->orderDate)));
        $stat->bindParam(":orderDate", $this->orderDate);
        $stat->execute();

        return $stat;
    }

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อรายบุคคล
    public function readOrderCoffeeByCustomerId()
    {
        $strSQL = "SELECT * FROM order_tb a, orderdetail_tb b WHERE a.orderId=b.orderId AND customerId=:customerId";
        $stat = $this->conn_db->prepare($strSQL);
        $this->customerId = htmlspecialchars(stripcslashes(strip_tags($this->customerId)));
        $stat->bindParam(":customerId", $this->customerId);
        $stat->execute();

        return $stat;
    }
}

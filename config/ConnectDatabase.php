<?php
class ConnnectDatabase
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dti_test_db";
    private $conn_db;


    public function getConnectDatabase()
    {
        $this->conn_db = null;

        try {

            $this->conn_db = new PDO("mysql:host=" .
                $this->host . ";dbname=" .
                $this->dbname, $this->username, $this->password);

            $this->conn_db->exec("set names utf8");

            $this->conn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // เอาไว้ตรวจสอบ ตรวจสอบเสร็จแล้วให้ Comment
            //echo "Connected successfully"; 
        } catch (PDOException $e) {
            // เอาไว้ตรวจสอบ ตรวจสอบเสร็จแล้วให้ Comment
            //echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn_db;
    }
}

// <?php
// // Define constants for database credentials
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'dti_test_db');

// class ConnectDatabase
// {
//     // Use a static property to store the connection object
//     private static $conn_db = null;

//     // Use a private constructor to prevent creating new instances
//     private function __construct()
//     {
//         // Do nothing
//     }
//     // Use a public static method to get the connection object
//     public static function getConnectDatabase()
//     {
//         // Check if the connection object already exists
//         if (self::$conn_db == null) {
//             try {
//                 // Create a new PDO object with the constants
//                 self::$conn_db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

//                 self::$conn_db->exec("set names utf8");

//                 self::$conn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                 // Uncomment this line to check the connection status
//                 //echo "Connected successfully"; 
//             } catch (PDOException $e) {
//                 // Uncomment this line to see the error message
//                 //echo "Connection failed: " . $e->getMessage();
//             }
//         }

//         return self::$conn_db;
//     }
// }

<?php
class Database {
    private $host = "localhost";
    private $db_name = "life_path";
    private $username = "life_path";
    private $password = "LifePath141912";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage());
            echo "فشل الاتصال بقاعدة البيانات.";
        }
        return $this->conn;
    }
}
?>
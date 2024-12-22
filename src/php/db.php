<?php
/**
 * Database connection class
 */
class Database {
    private $host = 'localhost';
    private $db_name = 'daftar_login'; // Replace with your actual database name
    private $username = 'root'; // Default username for XAMPP
    private $password = ''; // Default password for XAMPP is empty
    public $conn;

    /**
     * Get the database connection
     * @return mysqli|null
     */
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
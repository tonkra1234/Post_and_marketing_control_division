<?php

class Config {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "users";
    private $dsn = "mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME . '';
    protected $conn = null;

    public function __construct() {
        try {
            $this->conn = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}

class DataBase extends Config {

    public function fetch_users(){

        $sql= " SELECT * FROM pmcd ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll();
        return $result;
    }

    public function change_password($password,$id){

        $sql= " UPDATE `pmcd` SET `password` = :password WHERE id = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'password' => $password,
        ]);
    
        return true;
    }
    
}

?>
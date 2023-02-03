<?php

class ConfigRecalled {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "recalled_product";
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


class RecalledProducts extends ConfigRecalled {

    public function fetch_recalled_products(){

        $sql= "SELECT count(*) as total_recalled_products FROM recalled_list ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results =  $stmt->fetch();

        return $results;
    }

    public function fetch_trash_recalled_products(){

        $sql= "SELECT * FROM trash ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    public function count_trash_recalled_products(){

        $sql= "SELECT count(*) as total_row_trash FROM trash ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();

        return $results;
    }

    public function delete_product($id) {
        $sql = "DELETE FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    public function retrieve_product($id) {
        $sql = "INSERT INTO recalled_list SELECT * FROM trash WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
        ]);
        return true;
    }

    
}

?>
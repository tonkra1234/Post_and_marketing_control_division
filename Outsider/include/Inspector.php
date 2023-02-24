<?php
class ConfigInspector {
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "gmp_inspection";
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

class Inspector extends ConfigInspector {

    public function inspectors() {
        
        $sql ="SELECT * FROM `inspector` ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result= $stmt->fetchAll();

        return $result;
    }


    
}

$db_inspector = new Inspector();
$Inspector = $db_inspector-> inspectors();
?>

<?php foreach($Inspector as $row){ ?>
    <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php };?>
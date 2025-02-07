<?php



class Conte_db
{
    private static $instance = null;
    protected $conn;
    private $user;
    private $pass;
    private $dbname;
    private $host;

    private function __construct($user, $pass, $dbname, $host)
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->host = $host;

        try {
            $this->conn = new PDO("pgsql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);

          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getConnection() {
        if(self::$instance === null) {
            self::$instance = new Conte_db('postgres', '1234', 'Youdemy', 'localhost');
        }
        return self::$instance;
    }

    public function getConn() {
        return $this->conn;
    }

}




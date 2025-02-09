<?php
namespace App\Libraries;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct()
    {
       
        $config = require __DIR__ . '/../config/database.php';

        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    public function connect()
    {
        try {
            // إنشاء اتصال باستخدام PDO
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}";
            $this->connection = new PDO($dsn, $this->username, $this->password);

            // تعيين وضعية عرض الأخطاء
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;
        } catch (PDOException $e) {
            die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
        }
    }

    // دالة لاختبار الاتصال
    public function testConnection()
    {
        try {
            $this->connect();
            return "تم الاتصال بنجاح بقاعدة البيانات: {$this->dbname}";
        } catch (PDOException $e) {
            return "فشل الاتصال بقاعدة البيانات: " . $e->getMessage();
        }
    }
}
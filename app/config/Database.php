<?php
namespace APP\config;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../vendor/autoload.php";

use PDO;


$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database{
    private $username;
    private $password;
    private $servername;
    private $dbname;
    private $db;
    public function __construct(){
        $this->username=$_ENV["USERNAME"];
        $this->password=$_ENV["PASSWORD"];
        $this->dbname=$_ENV["DBNAME"];
        $this->servername=$_ENV["SERVERNAME"];
    }
    public function getConnection(){
        try {
            $this->db=new pdo("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
            return $this->db;
        } catch (\PDOException $err) {
            echo $err->getMessage();
        }
    }
}
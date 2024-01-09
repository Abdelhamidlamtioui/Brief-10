<?php
namespace APP\model;
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\config\Database;
use PDO;
use PDOException;

class User{
    private $database;
    public function __construct(){
        $conection=new Database();
        $this->database=$conection->getConnection();
    }

    public function add($firstname,$lastname,$email,$password,){
        try {
            $sql ="INSERT INTO users (`firstname`, `lastname`,`email`, `password`,`is_admin`) VALUES (:firstname,:lastname,:email,:password,0)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':lastname',$lastname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password',$password);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function deleteById($id){
        try{
            $sql ="DELETE FROM users WHERE id = :id";
            $statement=$this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function findUserByEmail($email){
        try{
            $sql ="SELECT * FROM users WHERE email=:email";
            $statement=$this->database->prepare($sql);
            $statement->bindParam(':email',$email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getAll($id){
        try{
            $sql="SELECT * FROM users WHERE id != :id";
            $statement=$this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function count(){
        try{
            $sql ="SELECT COUNT(*) FROM users";
            $statement=$this->database->prepare($sql);
            $statement->execute();
            $result=$statement->fetch();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
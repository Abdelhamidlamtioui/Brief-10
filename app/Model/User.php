<?php
namespace APP\model;
require_once "./../../vendor/autoload.php";
use APP\config\Database;
use PDO;

class User{
    private $database;
    public function __construct(){
        $conection=new Database();
        $this->database=$conection->getConnection();
    }

    public function add($firstname,$lastname,$email,$password,){
        $sql ="INSERT INTO users (`firstname`, `lastname`,`email`, `password`,`is_admin`) VALUES (:firstname,:lastname,:email,:password,0)";
        $statement = $this->database->prepare($sql);
        $statement->bindParam(':firstname', $firstname);
        $statement->bindParam(':lastname',$lastname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password',$password);
        $statement->execute();
    }
    public function deleteById($id){
        $sql ="DELETE FROM users WHERE id = :id";
        $statement=$this->database->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->execute();
    }
    public function findUserByEmail($email){
        $sql ="SELECT * FROM users WHERE email=:email";
        $statement=$this->database->prepare($sql);
        $statement->bindParam(':email',$email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAll($id){
        $sql="SELECT * FROM users WHERE id != :id";
        $statement=$this->database->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->execute();
        return $statement;
    }
    public function count(){
        $sql ="SELECT COUNT(*) FROM users";
        $statement=$this->database->prepare($sql);
        $statement->execute();
        $result=$statement->fetch();
        return $result;
    }
}
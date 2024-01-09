<?php
namespace APP\model;
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\config\Database;
use PDO;
use PDOException;

class Categories{
    private $database;
    public function __construct(){
        $conection=new Database();
        $this->database=$conection->getConnection();
    }


    public function addCategorie($title){
        try {
            $sql ="INSERT INTO categories (`title`) VALUES (:title)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':title',$title);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllCategories(){
        try{
            $sql="SELECT * FROM categories";
            $stmt=$this->database->prepare($sql);
            $stmt->execute();
            return $stmt;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function getOneCategorie($id){
        try{
            $sql="SELECT * FROM categories WHERE id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function deleteCategorie($id){
        try{
            $sql="DELETE FROM categories WHERE id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function editCategorie($id,$title){
        try {
            $sql ="UPDATE categories SET `title`=:title WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':title',$title);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}
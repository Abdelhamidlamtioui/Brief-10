<?php
namespace APP\Model;
include_once __DIR__.'/../../vendor/autoload.php';
use APP\config\Database;
use PDOException;
class Wikies{
    private $database;
    public function __construct(){
        $connection=new Database;
        $this->database=$connection->getConnection();
    }
    
    public function addWikie($title,$content,$user_id,$category_id){
        try {
            $sql ="INSERT INTO wiki (`title`, `content`,`visibility`, `author_id`,`category_id`) VALUES (:title,:content,1,:user_id,:category_id)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':content',$content);
            $statement->bindParam(':user_id', $user_id);
            $statement->bindParam(':category_id',$category_id);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function archiveWikie($id){
        try{
            $sql ="UPDATE wiki SET visibility = 0 WHERE id=:id";
            $statement=$this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllWikies(){
        try{
            $sql="SELECT * FROM wiki";
            $stmt=$this->database->prepare($sql);
            $stmt->execute();
            return $stmt;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function getOneWikie($id){
        try{
            $sql="SELECT * FROM wiki WHERE id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function editWikie($id,$title,$content){
        try {
            $sql ="UPDATE wiki SET `title`=:title , `content`=:content WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':title',$title);
            $statement->bindParam(':title',$content);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
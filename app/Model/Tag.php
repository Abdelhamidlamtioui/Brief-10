<?php
namespace APP\model;
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\config\Database;
use PDO;
use PDOException;

class Tag{
    private $database;
    public function __construct(){
        $conection=new Database();
        $this->database=$conection->getConnection();
    }

    public function addTag($title){
        try {
            $sql ="INSERT INTO tag (`title`) VALUES (:title)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':title',$title);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllTags(){
        try{
            $sql="SELECT * FROM tag";
            $stmt=$this->database->prepare($sql);
            $stmt->execute();
            $fetchall=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $fetchall;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function getAllTagsWikiePage($id){
        try{
            $sql="SELECT tag.title
            FROM tag
            INNER JOIN wikiTag ON tag.id = wikiTag.tag_id
            WHERE wikiTag.wiki_id = :id
            ";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $fetchall=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $fetchall;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function getOneTag($id){
        try{
            $sql="SELECT * FROM tag WHERE id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $fetch=$stmt->fetch(PDO::FETCH_ASSOC);
            return $fetch;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function deleteTag($id){
        try{
            $sql="DELETE FROM tag WHERE id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function editTag($id,$title){
        try {
            $sql ="UPDATE tag SET `title`=:title WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':title',$title);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function countTags(){
        try{
            $sql ="SELECT COUNT(*) FROM tag";
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
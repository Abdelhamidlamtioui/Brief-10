<?php
namespace APP\Model;
include_once __DIR__.'/../../vendor/autoload.php';
use APP\config\Database;
use PDOException;
use PDO;
class Wikies{
    private $database;
    public function __construct(){
        $connection=new Database;
        $this->database=$connection->getConnection();
    }
    
    public function addWikie($title,$content,$user_id,$category_id,$tag_id){
        try {
            $sql ="INSERT INTO wiki (`title`, `content`,`visibility`, `author_id`,`category_id`) VALUES (:title,:content,1,:user_id,:category_id)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':content',$content);
            $statement->bindParam(':user_id', $user_id);
            $statement->bindParam(':category_id',$category_id);
            $statement->execute();

            $wikie_id=$this->database->lastInsertId();
            
            $sql ="INSERT INTO wikitag (`wiki_id`, `tag_id`) VALUES (:wiki_id,:tag_id)";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':wiki_id', $wikie_id);
            $statement->bindParam(':tag_id',$tag_id);
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
            $fetchall=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $fetchall;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function deleteWikie($id){
        try{
            $sql="DELETE FROM wiki WHERE id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            $sql="DELETE FROM wikitag WHERE wiki_id= :id";
            $stmt=$this->database->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
        }catch(PDOException $e){
            echo"Error: ".$e->getMessage();
        }
    }

    public function getAllUserWikies($id){
        try{
            $sql="SELECT * FROM wiki WHERE author_id = :id AND visibility = 1;";
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

    public function getLastTreeWikies(){
        try{
            $sql="SELECT * FROM wiki WHERE visibility = 1 ORDER BY created_at DESC LIMIT 3;";
            $stmt=$this->database->prepare($sql);
            $stmt->execute();
            $fetchall=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $fetchall;
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
            $fetch=$stmt->fetch(PDO::FETCH_ASSOC);
            return $fetch;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function searchForWikie($query){
        try{
            $sql="SELECT * FROM wiki WHERE title LIKE ? AND visibility = 1;";
            $stmt = $this->database->prepare($sql);
            $stmt->execute(["%$query%"]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }catch( PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }
    }

    public function editWikie($id,$title,$content,$category_id,$tag_id){
        try {
            $sql ="UPDATE wiki SET `title`=:title , `content`=:content , `category_id`=:category_id WHERE id = :id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':title',$title);
            $statement->bindParam(':content',$content);
            $statement->bindParam(':category_id',$category_id);
            $statement->execute();

            $sql ="UPDATE wikitag SET `tag_id`=:tag_id WHERE `wiki_id`=:wiki_id";
            $statement = $this->database->prepare($sql);
            $statement->bindParam(':wiki_id', $id);
            $statement->bindParam(':tag_id',$tag_id);
            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
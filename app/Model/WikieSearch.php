<?php

namespace APP\Model;
include_once __DIR__.'/../../vendor/autoload.php';
use APP\config\Database;
use PDOException;
use PDO;

class WikieSearch {
    private $database;
    public function __construct(){
        $connection=new Database;
        $this->database=$connection->getConnection();
    }

    public function searchForWikieByTitle($query) {
        try {
            $sql = "SELECT * FROM wiki WHERE title LIKE ? AND visibility = 1;";
            $stmt = $this->database->prepare($sql);
            $stmt->execute(["%$query%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    public function searchForWikieByCategory($query) {
        try {
            $sql = "SELECT * FROM wiki WHERE category_id= :category_id AND visibility = 1;";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':category_id',$query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }
    public function searchForWikieByTag($query) {
        try {
            $sql = "SELECT w.title, w.content, c.name as category_name, t.name as tag_name
            FROM wiki w
            LEFT JOIN category c ON w.category_id = c.id
            JOIN wikiTag wt ON w.id = wt.wiki_id
            JOIN tag t ON wt.tag_id = t.id
            WHERE w.title LIKE ? OR c.name LIKE ? OR t.name LIKE ?;";
            $stmt = $this->database->prepare($sql);
            $stmt->execute(["%$query%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }
}
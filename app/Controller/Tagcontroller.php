<?php

namespace APP\Controller;

require_once __DIR__ . "/../../vendor/autoload.php";

use APP\model\Tag;
use PDO;
class Tagcontroller{
    public function findAllTags(){
        $tags=new Tag;
        $result=$tags->getAllTags();
        $fetchall=$result->fetchAll(PDO::FETCH_ASSOC);
        return $fetchall;
    }

    public function findOneTag($id){
        $tags=new Tag;
        $result=$tags->getOneTag($id);
        $fetch=$result->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    public function addTag($title){
        $tags=new Tag;
        $tags->addTag($title);
    }

    public function deleteTag($id){
        $tags=new Tag;
        $tags->deleteTag($id);
    }

    public function editTag($id,$title){
        $tags=new Tag;
        $tags->editTag($id,$title);
    }

}

$tags=new Tagcontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-tag'])) {
    $title=$_POST['title'];
    $tags->addTag($title);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-tag'])) {
    $title=$_POST['title'];
    $id=$_POST['id'];
    $tags->editTag($id,$title);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-tag'])) {
    $id=$_POST['id'];
    $tags->deleteTag($id);
}

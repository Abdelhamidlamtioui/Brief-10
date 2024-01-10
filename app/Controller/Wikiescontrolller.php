<?php

namespace APP\Controller;

require_once __DIR__ . "/../../vendor/autoload.php";

use APP\model\Wikies;
use PDO;
class Wikiescontroller{
    public function findAllWikies(){
        $Wikies=new Wikies;
        $result=$Wikies->getAllWikies();
        $fetchall=$result->fetchAll(PDO::FETCH_ASSOC);
        return $fetchall;
    }
    public function findOneWikie($id){
        $Wikies=new Wikies;
        $result=$Wikies->getOneWikie($id);
        $fetch=$result->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    public function addWikie($title,$content,$user_id,$category_id){
        $Wikies=new Wikies;
        $Wikies->addWikie($title,$content,$user_id,$category_id);
    }

    public function archiveWikie($id){
        $Wikies=new Wikies;
        $Wikies->archiveWikie($id);
    }

    public function editWikie($id,$title,$content){
        $Wikies=new Wikies;
        $Wikies->editWikie($id,$title,$content);
    }

}

$wikies=new Wikiescontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-wikies'])) {
    $title=$_POST['title'];
    $content=$_POST['content'];
    $user_id=$_POST['user_id'];
    $category_id=$_POST['category_id'];
    $wikies->addWikie($title,$content,$user_id,$category_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-wikie'])) {
    $title=$_POST['title'];
    $content=$_POST['content'];
    $id=$_POST['id'];
    $wikies->editWikie($id,$title,$content);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive-wikie'])) {
    $id=$_POST['id'];
    $wikies->archiveWikie($id);
}

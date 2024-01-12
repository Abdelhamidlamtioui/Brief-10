<?php

namespace APP\Controller;
if(session_status()==PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\model\Wikies;
use PDO;
class Wikiescontroller{
    public function findAllWikies(){
        $Wikies=new Wikies;
        $result=$Wikies->getAllWikies();
        return $result;
    }

    public function findAllWikiesHome(){
        $Wikies=new Wikies;
        $result=$Wikies->getAllWikiesHome();
        return $result;
    }

    public function findAllUserWikies(){
        $Wikies=new Wikies;
        $id=$_SESSION['id'];
        $result=$Wikies->getAllUserWikies($id);
        return $result;
    }

    public function findOneWikie($id){
        $Wikies=new Wikies;
        $result=$Wikies->getOneWikie($id);
        return $result;
    }

    public function findOneWikiePage($id){
        $Wikies=new Wikies;
        $result=$Wikies->getOneWikiePage($id);
        return $result;
    }
   

    public function findlastTreeWikies(){
        $Wikies=new Wikies;
        $result=$Wikies->getLastTreeWikies();
        return $result;
    }

    public function addWikie($title, $content, $category_id, $tag_ids,$author_id){
        $Wikies=new Wikies;
        $Wikies->addWikie($title, $content, $category_id, $tag_ids,$author_id);
        header('location:./../../view/admin/manage_wikies.php');
    }

    public function deleteWikie($id){
        $Wikies=new Wikies;
        $Wikies->deleteWikie($id);
        header('location:./../../view/admin/manage_wikies.php');
    }

    public function archiveWikie($id){
        $Wikies=new Wikies;
        $Wikies->archiveWikie($id);
        header('location:./../../view/admin/manage_wikies.php');
    }

    public function unarchiveWikie($id){
        $Wikies=new Wikies;
        $Wikies->unarchiveWikie($id);
        header('location:./../../view/admin/manage_wikies.php');
    }

    public function editWikie($id, $title, $content, $category_id, $tag_ids){
        $Wikies=new Wikies;
        $Wikies->editWikie($id, $title, $content, $category_id, $tag_ids);
        header('location:./../../view/admin/manage_wikies.php');
    }

    public function wikiesNumbers(){
        $user=new Wikies();
        $result=$user->countWikies();
        return $result;
    }

}

$wikies=new Wikiescontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-wikie'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category-id'];
    $tag_ids = isset($_POST['tags']) ? $_POST['tags'] : []; 
    $author_id = $_POST['user-id'];
    $wikies->addWikie($title, $content, $category_id, $tag_ids,$author_id);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-wikie'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category-id'];
    $tag_ids = isset($_POST['tags']) ? $_POST['tags'] : []; 
    $id = $_GET['id'];
    $wikies->editWikie($id, $title, $content, $category_id, $tag_ids);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-wikie'])) {
    $id=$_GET['id'];
    $wikies->deleteWikie($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive-wikie'])) {
    $id=$_GET['id'];
    $wikies->archiveWikie($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['unarchive-wikie'])) {
    $id=$_GET['id'];
    $wikies->unarchiveWikie($id);
}

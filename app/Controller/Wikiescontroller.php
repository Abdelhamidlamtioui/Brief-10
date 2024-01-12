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

    public function searchForWikie($search){
        $Wikies=new Wikies;
        $result=$Wikies->searchForWikie($search);
        return $result;
    }

    public function findlastTreeWikies(){
        $Wikies=new Wikies;
        $result=$Wikies->getLastTreeWikies();
        return $result;
    }

    public function addWikie($title,$content,$user_id,$category_id,$tag_id){
        $Wikies=new Wikies;
        $Wikies->addWikie($title,$content,$user_id,$category_id,$tag_id);
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

    public function editWikie($id,$title,$content,$category_id,$tag_id){
        $Wikies=new Wikies;
        $Wikies->editWikie($id,$title,$content,$category_id,$tag_id);
        header('location:./../../view/admin/manage_wikies.php');
    }

}

$wikies=new Wikiescontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-wikie'])) {
    $title=$_POST['title'];
    $content=$_POST['content'];
    $user_id=$_POST['user-id'];
    $category_id=$_POST['category-id'];
    $tag_id=$_POST['tag-id'];
    $wikies->addWikie($title,$content,$user_id,$category_id,$tag_id);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-wikie'])) {
    $title=$_POST['title'];
    $content=$_POST['content'];
    $category_id=$_POST['category-id'];
    $tag_id=$_POST['tag-id'];
    $id=$_GET['id'];
    $wikies->editWikie($id,$title,$content,$category_id,$tag_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-wikie'])) {
    $id=$_GET['id'];
    $wikies->deleteWikie($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive-wikie'])) {
    $id=$_GET['id'];
    $wikies->archiveWikie($id);
}

if(isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $wikies_result=$wikies->searchForWikie($search);
    foreach ($wikies_result as $wikie) {
        echo '<div>';
        echo '<img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="" alt="">';
        echo '<div class="mt-8">';
        echo '<span class="text-blue-500 uppercase">category</span>';
        echo '<h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">' . htmlspecialchars($wikie['title']) . '</h1>';
        echo '<p class="mt-2 text-gray-500 dark:text-gray-400">' . htmlspecialchars($wikie['content']) . '</p>';
        echo '<div class="flex items-center justify-between mt-4">';
        echo '<div>';
        echo '<p class="text-sm text-gray-500 dark:text-gray-400">' . htmlspecialchars($wikie['created_at']) . '</p>';
        echo '</div>';
        echo '<a href="#" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
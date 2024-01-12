<?php

namespace APP\Controller;

require_once __DIR__ . "/../../vendor/autoload.php";

use APP\model\Categories;
use PDO;
class Categoriescontroller{
    public function findAllCategories(){
        $categories=new Categories;
        $result=$categories->getAllCategories();
        return $result;
    }

    public function findOneCategorie($id){
        $categories=new Categories;
        $result=$categories->getOneCategorie($id);
        return $result;
    }

    public function addCategorie($title){
        $categories=new Categories;
        $categories->addCategorie($title);
        header('location:./../../view/admin/manage_Categories.php');
    }

    public function deleteCategorie($id){
        $categories=new Categories;
        $categories->deleteCategorie($id);
        header('location:./../../view/admin/manage_Categories.php');
    }

    public function editCategorie($id,$title){
        $categories=new Categories;
        $categories->editCategorie($id,$title);
        header('location:./../../view/admin/manage_Categories.php');
    }

    public function wikiesNumbers(){
        $user=new Categories();
        $result=$user->countCategories();
        return $result;
    }

}

$categories=new Categoriescontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-categorie'])) {
    echo 'khedam';
    $title=$_POST['title'];
    $categories->addCategorie($title);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-categorie'])) {
    $title=$_POST['title'];
    $id=$_GET['id'];
    $categories->editCategorie($id,$title);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-categorie'])) {
    $id=$_GET['id'];
    $categories->deleteCategorie($id);
}

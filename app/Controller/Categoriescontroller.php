<?php

namespace APP\Controller;

require_once __DIR__ . "/../../vendor/autoload.php";

use APP\model\Categories;
use PDO;
class Categoriescontroller{
    public function findAllCategories(){
        $categories=new Categories;
        $result=$categories->getAllCategories();
        $fetchall=$result->fetchAll(PDO::FETCH_ASSOC);
        return $fetchall;
    }

    public function findOneCategorie($id){
        $categories=new Categories;
        $result=$categories->getOneCategorie($id);
        $fetch=$result->fetch(PDO::FETCH_ASSOC);
        return $fetch;
    }

    public function addCategorie($title){
        $categories=new Categories;
        $categories->addCategorie($title);
    }

    public function deleteCategorie($id){
        $categories=new Categories;
        $categories->deleteCategorie($id);
    }

    public function editCategorie($id,$title){
        $categories=new Categories;
        $categories->editCategorie($id,$title);
    }

}

$categories=new Categoriescontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-categorie'])) {
    $title=$_POST['title'];
    $categories->addCategorie($title);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-categorie'])) {
    $title=$_POST['title'];
    $id=$_POST['id'];
    $categories->editCategorie($id,$title);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-categorie'])) {
    $id=$_POST['id'];
    $categories->deleteCategorie($id);
}

<?php

namespace APP\Controller;

require_once __DIR__ . "/../../vendor/autoload.php";
use APP\model\User;
use PDO;
class Usercontroller{
    public function register($firstname,$lastname,$email,$password){
        $user=new User();
        $user->add($firstname,$lastname,$email,$password);
    }
    public function login($email,$password){
        $user=new User();
        $userinfo=$user->findUserByEmail($email);
        if (!empty($userinfo)) {
            if(password_verify($password,$userinfo['password'])){
                $_SESSION['id']=$userinfo['id'];
                $_SESSION['role']=$userinfo['is_admin'];
                if ($_SESSION['role']===0) {
                    header('location:./../../view/admin/index.php');
                }else{
                    header('location:./../../view/admin/dashboard.php');
                }
            }else{
                header('location:./../../view/login.php');
            }
        }
    }

    public function logout(){
        session_destroy();
    }

    public function findAll($id){
        $user=new User();
        $result=$user->getAll($id);
        return $result;
    }

    public function findOne($id){
        $user=new User();
        $result=$user->getOne($id);
        return $result;
    }

    public function editUser($id,$role){
        $user=new User();
        $user->editUser($id,$role);
        header('location:./../../view/admin/manage_Users.php');
    }

    public function delete($id){
        $user=new User();
        $user->deleteById($id);
        header('location:./../../view/admin/manage_Users.php');
    }

    public function usersNumbers(){
        $user=new User();
        $result=$user->countUsers();
        $usersNumbers=$result->fetchAll();
        return $usersNumbers;
    }
}

$user= new Usercontroller;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register-form'])) {
    $firstname = filter_var($_POST['first-name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['last-name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmedpassword = filter_var($_POST['confirm-password'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($firstname)) {
        echo 'Enter a valid firstname';
    } elseif (empty($lastname)) {
        echo 'Enter a valid lastname';
    } elseif (empty($email)) {
        echo 'Enter a valid email';
    } elseif (strlen($password) < 8) {
        echo 'Enter a password that has at least 8 characters';
    } elseif ($password !== $confirmedpassword) {
        echo 'Passwords do not match';
    } else {
        $password=password_hash($confirmedpassword,PASSWORD_DEFAULT);
        $user->register($firstname, $lastname, $email, $password);
        header('location:./../../view/login.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-form'])){
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($email)) {
        echo "entre your email";
    }elseif (empty($password)) {
        echo "entre your password";
    }else {
        $user->login($email,$password);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['log-out'])){

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-user'])){
    $id=$_GET['id'];
    $user->delete($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-user'])){
    $id=$_GET['id'];
    $role=$_POST['role'];
    $user->editUser($id,$role);
}

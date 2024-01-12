<?php 
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\Controller\Usercontroller;
$user= new Usercontroller;
if (isset($_GET['id'])) {
    $result=$user->findOne($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <?php include_once 'navbar.php' ?>
    <section>
        <div class="flex justify-center text-5xl pt-10">
            <h1>Edit user</h1>
        </div>
        <div class="w-6/12 mx-auto mt-10">
            <form action="./../../app/Controller/Usercontroller.php?id=<?=$_GET['id']?>" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">First Name:</label>
                    <span id="firstname" class="text-gray-700 text-lg"><?= $result['firstname'] ?></span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Last Name:</label>
                    <span id="lastname" class="text-gray-700 text-lg"><?= $result['lastname'] ?></span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Email:</label>
                    <span id="email" class="text-gray-700 text-lg"><?= $result['email'] ?></span>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-lg font-bold mb-2">Role:</label>
                    <select name="role" id="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        <option value="0">Writer</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" name="edit-user" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 text-lg">
                    Update User
                </button>
            </form>
        </div>
    </section>
</body>
</html>
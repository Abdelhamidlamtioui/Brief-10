<?php 
require_once __DIR__ . "/../vendor/autoload.php";

use APP\Controller\Categoriescontroller;
$user= new Categoriescontroller;
if (isset($_GET['id'])) {
    $result=$user->findOneCategorie($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <nav class="flex justify-between items-center bg-blue-500 text-white h-14 text-lg">
        <div class="text-2xl font-bold pl-10 cursor-pointer">LOGO</div>
        <div>
            <ul class="flex gap-7 font-semibold">
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Users.php">Manage User</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Category.php">Manage Categories</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Wikies.php">Manage Wikies</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Tags.php">Manage Tags</a></li>
            </ul>
        </div>
        <div class="pr-10">
            <a class="bg-red-600 hover:bg-red-400 py-1 px-2 rounded-md cursor-pointer" href="Logout.php">Logout</a>
        </div>
    </nav>
    <section>
        <div class="flex justify-center text-5xl pt-10">
            <h1>Edit Category</h1>
        </div>
        <div class="w-6/12 mx-auto mt-10">
            <form action="./../app/Controller/Categoriescontroller.php?id=<?=$_GET['id']?>" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Title of the Category:</label>
                    <input type="text" name="title" value="<?= $result['title']?>" id="title" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" />
                </div>
                <button type="submit" name="edit-categorie" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 text-lg">
                    Update Category
                </button> 
            </form>
        </div>
    </section>
</body>
</html>
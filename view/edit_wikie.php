<?php
include_once __DIR__.'/../vendor/autoload.php';
use APP\Controller\Categoriescontroller;
use APP\Controller\Tagcontroller;
use APP\Controller\Wikiescontroller;
$wikie=new Wikiescontroller;
if (isset($_GET['id'])) {
    $wikie_results=$wikie->findOneWikie($_GET['id']);
}
$category=new Categoriescontroller;
$category_results=$category->findAllCategories();
$tag=new Tagcontroller;
$tag_results=$tag->findAllTags();
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
            <h1>Add Wikie</h1>
        </div>
        <div class="w-6/12 mx-auto mt-10">
            <form action="./../app/Controller/Wikiescontroller.php?id=<?=$_GET['id']?>" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Title of the Wikie:</label>
                    <input value="<?= $wikie_results['title'] ?>" type="text" name="title" id="title" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Content of the Wikies:</label>
                    <textarea type="text" name="content" id="content" cols="30" rows="10" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" ><?= $wikie_results['content'] ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="categorie-id" class="block text-gray-700 text-lg font-bold mb-2">Categories:</label>
                    <select name="category-id" id="categorie-id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        <?php foreach ($category_results as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                        <?php endforeach ; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tag-id" class="block text-gray-700 text-lg font-bold mb-2">Tags:</label>
                    <select name="tag-id" id="tag-id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        <?php foreach ($tag_results as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option>
                        <?php endforeach ; ?>
                    </select>
                </div>
                <button type="submit" name="edit-wikie" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 text-lg">
                    Edit Wikie
                </button> 
            </form>
        </div>
    </section>
</body>
</html>
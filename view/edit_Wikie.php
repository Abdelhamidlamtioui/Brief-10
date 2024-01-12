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
    <nav class="bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="index.php" class="text-white font-bold text-2xl">BLOGO</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <?php if (isset($_SESSION['role'])): ?>
                            <a href="./add_Wikie.php" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:bg-green-700 transition duration-300 ease-in-out">
                                <i class="fas fa-plus-circle"></i> Add Wiki
                            </a>
                            <a href="./my_wikies.php" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:bg-purple-700 transition duration-300 ease-in-out">
                                <i class="fas fa-book"></i> My Wikies
                            </a>
                            <form method="post" action="./../app/Controller/Usercontroller.php">
                                <button name="log-out" class="px-4 py-2 rounded-md text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 transition duration-300 ease-in-out"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                            </form>
                        <?php else: ?>
                            <a href="./signup.php" class="bg-blue-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">Get Started</a>
                        <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>
    </nav>
    <section>
        <div class="flex justify-center text-5xl pt-10">
            <h1>Edit Wikie</h1>
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
                    <label for="tag-id" class="block text-gray-700 text-lg font-bold mb-2">Tag:</label>
                    <?php foreach ($tag_results as $data): ?>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="tag-<?= htmlspecialchars($data['id']) ?>" name="tags[]" value="<?= htmlspecialchars($data['id']) ?>" class="mr-2">
                            <label for="tag-<?= htmlspecialchars($data['id']) ?>" class="text-lg"><?= htmlspecialchars($data['title']) ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" name="edit-wikie" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 text-lg">
                    Edit Wikie
                </button> 
            </form>
        </div>
    </section>
</body>
</html>
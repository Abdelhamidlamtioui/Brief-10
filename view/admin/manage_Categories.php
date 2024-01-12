<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use APP\Controller\Categoriescontroller;
$getall= new Categoriescontroller;
$results=$getall->findAllCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once 'navbar.php' ?>
    <section class="py-10">
        <div class="text-center text-5xl mb-10">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Manage Categories</h1>
            <div class="text-center my-4">
                <a href="add_Category.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-lg text-lg transition duration-150 ease-in-out">
                    + Add New Category
                </a>
            </div>
        </div>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($results as $result) : ?>
                <div class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300 ease-in-out overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center">
                            <i class="fas fa-layer-group mr-2 text-blue-500"></i><?= htmlspecialchars($result['title']); ?>
                        </h3>
                        <div class="mt-4 flex items-center space-x-4">
                            <form method="post" action="./../../app/Controller/Categoriescontroller.php?id=<?= $result['id']; ?>">
                                <button name="delete-categorie" class="flex items-center justify-center text-red-600 hover:text-white hover:bg-red-700 py-2 px-4 rounded-md focus:outline-none">
                                    <i class="fas fa-trash-alt mr-2"></i>Delete
                                </button>
                            </form>
                            <a href="edit_Category.php?id=<?= $result['id']; ?>" class="flex items-center justify-center text-blue-600 hover:text-white hover:bg-blue-700 py-2 px-4 rounded-md focus:outline-none">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</body>
</html>
<?php

use APP\Controller\Categoriescontroller;
use APP\Controller\Tagcontroller;
use APP\Controller\Usercontroller;
use APP\Controller\Wikiescontroller;

require_once __DIR__ . "/../../vendor/autoload.php";
$user=new Usercontroller;
$wikie=new Wikiescontroller;
$tag=new Tagcontroller;
$category=new Categoriescontroller;
$user_count=$user->usersNumbers();
$wikie_count=$wikie->wikiesNumbers();
$tag_count=$tag->tagsNumbers();
$category_count=$category->wikiesNumbers();
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
<body>
    <?php include_once 'navbar.php' ?>
    <section class="pt-10">
        <div class="container mx-auto">
            <div class="text-center text-5xl mb-10">
                <h1>DASHBOARD</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Users Card -->
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <i class="fas fa-users fa-2x fa-fw text-white"></i>
                        </div>
                        <div class="ml-5">
                            <p class="font-bold text-gray-600 text-lg">Users</p>
                            <p class="text-gray-500"><?= $user_count['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-500 bg-opacity-75">
                            <i class="fas fa-book fa-2x fa-fw text-white"></i>
                        </div>
                        <div class="ml-5">
                            <p class="font-bold text-gray-600 text-lg">Wikies</p>
                            <p class="text-gray-500"><?= $wikie_count['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-500 bg-opacity-75">
                            <i class="fas fa-tags fa-2x fa-fw text-white"></i>
                        </div>
                        <div class="ml-5">
                            <p class="font-bold text-gray-600 text-lg">Tags</p>
                            <p class="text-gray-500"><?= $tag_count['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-5">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-500 bg-opacity-75">
                            <i class="fas fa-layer-group fa-2x fa-fw text-white"></i>
                        </div>
                        <div class="ml-5">
                            <p class="font-bold text-gray-600 text-lg">Categories</p>
                            <p class="text-gray-500"><?= $category_count['COUNT(*)']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</body>
</html>
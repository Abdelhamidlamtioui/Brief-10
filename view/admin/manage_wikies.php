<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\Controller\Wikiescontroller;
$getall= new Wikiescontroller;
$results=$getall->findAllWikies();
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
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Manage Wikies</h1>
            <div class="text-center my-4">
                <a href="add_Wikie.php"
                class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-lg text-lg transition duration-150 ease-in-out">
                    + Add New Wikie
                </a>
            </div>
        </div>
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($results as $result) : ?>
                    <div class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-300 ease-in-out overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                <i class="fas fa-book mr-2 text-blue-500"></i><?= htmlspecialchars($result['title']); ?>
                            </h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-900">
                                <p><?= substr(htmlspecialchars($result['content']), 0, 100) . '...'; ?></p>
                            </div>
                            <div class="mt-3 text-sm">
                                <p class="text-gray-900">Archived: <?= $result['visibility'] === 1 ? 'No' : 'Yes'; ?></p>
                            </div>
                            <div class="mt-3 text-sm">
                                <p class="text-gray-900">Date: <?= htmlspecialchars($result['created_at']); ?></p>
                            </div>
                            <div class="mt-3 text-sm">
                                <p class="text-gray-900">User ID: <?= htmlspecialchars($result['author_id']); ?></p>
                            </div>
                            <div class="mt-3 text-sm">
                                <p class="text-gray-900">Category ID: <?= htmlspecialchars($result['category_id']); ?></p>
                            </div>
                            <div class="mt-4 flex items-center space-x-4">
                                <?php if ($result['visibility']===1):?>
                                <form method="post" action="./../../app/Controller/Wikiescontroller.php?id=<?= $result['id']; ?>">
                                    <button name="archive-wikie" class="flex items-center justify-center text-yellow-500 hover:text-white hover:bg-yellow-600 text-white py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                                        <i class="fas fa-archive mr-2"></i>Archive
                                    </button>
                                </form>
                                <?php else: ?>
                                <form method="post" action="./../../app/Controller/Wikiescontroller.php?id=<?= $result['id']; ?>">
                                    <button name="unarchive-wikie" class="flex items-center justify-center text-green-500 hover:text-white hover:bg-green-600 text-white py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
                                        <i class="fas fa-archive mr-2"></i>Unarchive
                                    </button>
                                </form>
                                <?php endif;?>
                                <a href="edit_Wikie.php?id=<?= $result['id']; ?>" class="flex items-center justify-center text-blue-600 hover:text-white hover:bg-blue-700 text-white py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">
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
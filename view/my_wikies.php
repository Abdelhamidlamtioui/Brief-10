<?php
require_once __DIR__ . "/../vendor/autoload.php";
use APP\Controller\Wikiescontroller;
$getall= new Wikiescontroller;
$results=$getall->findAllUserWikies();
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
    <section class="py-10">
        <div class="flex justify-center text-5xl mb-10">
            <h1>Manage Wikies</h1>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($results as $result) :?>
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                    <div class="p-5">
                        <h3 class="font-bold text-xl mb-2"><?= $result['title']?></h3>
                        <p class="text-gray-700 text-base mb-4">
                            <?= substr($result['content'], 0, 100) . '...'?>
                        </p>
                        <p class="text-sm text-gray-600 mb-4"><?= $result['created_at']?></p>
                        <p class="text-sm text-gray-600 mb-4"><?= $result['category_id']?></p>
                        <div class="flex justify-between">
                            <form method="post" action="./../app/Controller/Wikiescontroller.php?id=<?= $result['id'] ?>">
                                <button name="delete-wikie" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md focus:outline-none focus:shadow-outline">
                                    Delete
                                </button>
                            </form>
                            <a href="edit_Wikie.php?id=<?= $result['id'] ?>" class="bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded-md focus:outline-none focus:shadow-outline">
                                Edit
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
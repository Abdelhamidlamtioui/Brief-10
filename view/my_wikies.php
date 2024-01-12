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
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
              <div class="flex-shrink-0">
                  <a href="#" class="text-white font-bold text-xl">BLOGO</a>
              </div>
              <div class="hidden md:block">
                  <div class="ml-10 flex items-baseline space-x-4">
                        <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <?php if (isset($_SESSION['role'])): ?>
                            <a href="./add_Wikie.php" class="bg-green-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transition duration-150 ease-in-out">
                                <i class="fas fa-plus-circle"></i> Add Wiki
                            </a>
                            <form method="post" action="./../app/Controller/Usercontroller.php">
                                <button name="log-out" class="bg-red-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 transition duration-150 ease-in-out"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
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
            <h1>Manage Wikies</h1>
        </div>
        <div class="flex justify-center pt-10">
            <table class="max-w-1xl table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Title</th>
                        <th class="px-4 py-2 border">content</th>
                        <th class="px-4 py-2 border">Wikie date</th>
                        <th class="px-4 py-2 border">Categorie</th>
                        <th class="px-4 py-2 border"></th>
                        <th class="px-4 py-2 border"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) :?>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2"><?= $result['title']?></td>
                        <td class="border px-4 py-2"><?= $result['content']?></td>
                        <td class="border px-4 py-2"><?= $result['created_at']?></td>
                        <td class="border px-4 py-2"><?= $result['category_id']?></td>
                        <td class="border px-4 py-2">
                            <form method="post" action="./../app/Controller/Wikiescontroller.php?id=<?= $result['id'] ?>">
                                <button name="delete-wikie" class="bg-red-600 hover:bg-red-400 text-white py-1 px-2 rounded-md cursor-pointer">
                                    Delete
                                </button>
                            </form>
                        </td>
                        <td class="border px-4 py-2">
                            <a class="bg-green-600 hover:bg-green-400 text-white py-1 px-2 rounded-md cursor-pointer" href="edit_Wikie.php?id=<?= $result['id'] ?>">
                                Edit Wikie
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once './../vendor/autoload.php';
use APP\Controller\Wikiescontroller;
use APP\Controller\Tagcontroller;

$wikies=new Wikiescontroller;
$wikie=$wikies->findOneWikiePage($_GET['id']);
$tags=new Tagcontroller;
$wikietag=$tags->findAllTagsWikiePage($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class=" text-white">
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
  <div class="container mx-auto mt-10 p-5">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
      <h1 class="text-gray-700 text-3xl font-bold mb-2"><?= htmlspecialchars($wikie['title']) ?></h1>
      <p class="text-gray-700 text-sm mb-4">
        Published on <?= htmlspecialchars($wikie['created_at']) ?>
      </p>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= htmlspecialchars($wikie['categories_title']) ?></span>
      <div class="mt-4">
        <p class="text-gray-600 text-lg whitespace-pre-line">
          <?= htmlspecialchars($wikie['content']) ?>
        </p>
        <!-- Tags Section -->
        <div class="mt-4">
          <h2 class="text-gray-700 text-xl font-semibold mb-2">Tags:</h2>
          <div class="flex flex-wrap">
            <?php foreach ($wikietag as $tag): ?>
              <span class="bg-gray-300 text-gray-700 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded mb-2"><?= htmlspecialchars($tag['title']) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once './../vendor/autoload.php';
use APP\Controller\Categoriescontroller;
use APP\Controller\Tagcontroller;
use APP\Controller\Wikiescontroller;
$categories=new Categoriescontroller;
$categories_result=$categories->findAllCategories();
$tags=new Tagcontroller;
$tags_result=$tags->findAllTags();
$wikies=new Wikiescontroller;
// $wikies_result=$wikies->findAllWikies();
$last_Tree_wikies_result=$wikies->findlastTreeWikies();
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
<div class="bg-gray-800 text-white">
  <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-16">
              <div class="flex-shrink-0">
                  <a href="#" class="text-white font-bold text-xl">BLOGO</a>
              </div>
              <div class="hidden md:block">
                  <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <?php if (isset($_SESSION['role'])): ?>
                            <a href="./add_Wikie.php" class="bg-green-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transition duration-150 ease-in-out">
                                <i class="fas fa-plus-circle"></i> Add Wiki
                            </a>
                            <a href="./my_wikies.php" class="bg-purple-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-600 transition duration-150 ease-in-out">
                                <i class="fas fa-book"></i> My Wikies
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
  <section class="bg-cover bg-center h-96 text-white py-24 px-10 object-fill">
      <div class="max-w-7xl mx-auto">
          <div class="text-center">
              <h1 class="text-5xl font-bold mb-4">Welcome to Our Blog!</h1>
              <p class="text-xl mb-8">Discover inspiring stories, insights, and ideas</p>
              <a href="#search-posts" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                  Explore Our Posts
              </a>
          </div>
      </div>
  </section>
  <section class="bg-white dark:bg-gray-900 flex flex-row">
    <div class="w-full md:w-1/5 text-blue-400 border-r">
        <!-- Categories -->
        <div class="mb-6 p-5 text-gray-800">
            <h3 class="text-2xl font-semibold border-b pb-2">Categories</h3>
            <ul class="mt-4 text-lg text-gray-800">
                <?php foreach ($categories_result as $categorie): ?>
                    <li><?= htmlspecialchars($categorie['title'])?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- Tags -->
        <div class="p-5 text-gray-800">
            <h3 class="text-2xl font-semibold border-b pb-2">Tags</h3>
            <ul class="mt-4 text-lg text-gray-800">
                <?php foreach ($tags_result as $tag): ?>
                    <li><?= htmlspecialchars($tag['title'])?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <div class="w-full md:w-4/5 container px-6 py-10 mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Last recent 3 posts </h1>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($last_Tree_wikies_result as $wikie) :?>
            <div>
                <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="./img/Best-times-to-post-2022_BTTP-Social-Media.svg" alt="">

                <div class="mt-8">
                    <span class="text-blue-500 uppercase"><?= htmlspecialchars($wikie['category_title']) ?></span>

                    <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                        <?= htmlspecialchars($wikie['title']) ?>
                    </h1>

                    <p class="mt-2 text-gray-500 dark:text-gray-400">
                        <?= htmlspecialchars(substr($wikie['content'], 0, 200)) . (strlen($wikie['content']) > 200 ? '...' : '') ?>
                    </p>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400"><?=htmlspecialchars($wikie['created_at'])?></p>
                        </div>
                        <a href="wikie.php?id=<?= htmlspecialchars($wikie['id']) ?>" class="inline-block text-blue-500 underline hover:text-blue-400">Read More</a>
                    </div>

                </div>
            </div>
            <?php endforeach ;?>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between mt-4">
            <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">recent posts </h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2">Search:</label>
                <input id="search_Ajax" type="text" name="title" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" />
            </div>
            <div class="mb-4">
                <label for="tag-id" class="block text-gray-700 text-lg font-bold mb-2">Categories:</label>
                <select name="categories-id" id="categories-id" class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                            <?php foreach ($categories_result as $categorie) : ?>
                                <option value="<?= htmlspecialchars($categorie['id']) ?>"><?= htmlspecialchars($categorie['title']) ?></option>
                            <?php endforeach ; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="tag-id" class="block text-gray-700 text-lg font-bold mb-2">Tags:</label>
                <select name="tags-id" id="tags-id" class="shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                            <?php foreach ($tags_result as $tag) : ?>
                                <option value="<?= $tag['id'] ?>"><?= $tag['title'] ?></option>
                            <?php endforeach ; ?>
                </select>
            </div>
            <button class="focus:outline-none">
            </button>
        </div>

        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div id="search-posts" class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">

        </div>
    </div>
  </section>
</div>
<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-2">About Us</h3>
                <p class="text-gray-400 text-sm">We are committed to providing quality content and the latest news in our blog. Learn more about us and our mission.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Contact</h3>
                <ul class="text-gray-400 text-sm">
                    <li>Email: contact@example.com</li>
                    <li>Phone: +1 234 567 8901</li>
                    <li>Address: 123 Street Name, City</li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Follow Us</h3>
                <div class="flex mt-2">
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-400 text-sm mt-8">
            © 2024 BLOGO. All rights reserved.
        </div>
    </div>
</footer>
<script>
async function search(searchType, query) {
    try {
        const response = await fetch(`http://localhost/blog%20OOP/brief-10/app/Controller/WikieSearchcontroller.php?${searchType}=${encodeURIComponent(query)}`);
        if (response.ok) {
            const data = await response.json();
            let htmlContent = '';
            data.forEach(wikie => {
                htmlContent += `
                    <div>
                        <img class="object-cover object-center w-full h-64 rounded-lg lg:h-80" src="./img/Best-times-to-post-2022_BTTP-Social-Media.svg" alt="">
                        <div class="mt-8">
                            <span class="text-blue-500 uppercase">${wikie.categories_title}</span>
                            <h1 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">
                                ${wikie.title}
                            </h1>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">
                                ${wikie.content.substring(0, 200)}...
                            </p>
                            <div class="flex items-center justify-between mt-4">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">${wikie.created_at}</p>
                                </div>
                                <a href="#" class="inline-block text-blue-500 underline hover:text-blue-400">Read more</a>
                            </div>
                        </div>
                    </div>
                `;
            });
            document.getElementById('search-posts').innerHTML = htmlContent;
        }
    } catch (error) {
        console.log(error);
    }
}

document.getElementById('search_Ajax').addEventListener('input', function(e) {
    search('searchTitle', e.target.value);
});

document.getElementById('categories-id').addEventListener('input', function(e) {
    search('searchCategory', e.target.value);
});

document.getElementById('tags-id').addEventListener('input', function(e) {
    search('searchTag', e.target.value);
});
</script>
</body>
</html>
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
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
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
    <header class="bg-gradient-to-r from-blue-600 to-blue-900 text-white py-24 text-center">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-6xl font-bold mb-6">Welcome to Our Blog!</h1>
            <p class="text-2xl mb-8">Discover inspiring stories, insights, and ideas</p>
            <a href="#search-posts" class="bg-white hover:bg-gray-200 text-blue-800 font-bold py-3 px-6 rounded-full transition duration-300">
                Explore Our Posts
            </a>
        </div>
    </header>
    <section class="container mx-auto flex flex-wrap py-6">
    <div class="w-full md:w-1/5 text-gray-700 bg-gray-50 rounded-lg shadow-md">
    <!-- Categories -->
        <div class="mb-6 p-5">
            <h3 class="text-xl md:text-2xl font-semibold border-b border-gray-300 pb-3">Categories</h3>
            <ul class="mt-4">
                <?php foreach ($categories_result as $categorie): ?>
                    <li class="mt-2">
                        <a href="#" class="text-lg text-gray-700 hover:text-blue-500"><?= htmlspecialchars($categorie['title'])?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <!-- Tags -->
    <div class="p-5">
        <h3 class="text-xl md:text-2xl font-semibold border-b border-gray-300 pb-3">Tags</h3>
        <div class="flex flex-wrap mt-4">
            <?php foreach ($tags_result as $tag): ?>
                <a href="#" class="text-sm bg-gray-200 hover:bg-blue-500 hover:text-white text-gray-700 font-semibold mr-2 px-3 py-1 rounded-full mb-2 transition-colors duration-200"><?= htmlspecialchars($tag['title'])?></a>
            <?php endforeach; ?>
        </div>
    </div>
  </div>

    
    <div class="w-full md:w-4/5 pl-4 md:pl-12">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-800">Last Recent 3 Posts</h1>
        </div>
        <hr class="border-b border-gray-300 my-6">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($last_Tree_wikies_result as $wikie) : ?>
                <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <img class="object-cover object-center w-full h-64 rounded-t-lg" src="./img/Best-times-to-post-2022_BTTP-Social-Media.svg" alt="">

                    <div class="p-6">
                        <span class="inline-block bg-blue-100 text-blue-500 uppercase tracking-wide text-sm font-semibold rounded px-2 py-1"><?= htmlspecialchars($wikie['category_title']) ?></span>

                        <h2 class="mt-4 text-2xl font-bold text-gray-800 hover:text-gray-600 transition-colors duration-200">
                            <?= htmlspecialchars($wikie['title']) ?>
                        </h2>

                        <p class="mt-2 text-gray-600 text-sm leading-relaxed line-clamp-3">
                            <?= htmlspecialchars(substr($wikie['content'], 0, 200)) . (strlen($wikie['content']) > 200 ? '...' : '') ?>
                        </p>

                        <div class="flex items-center justify-between mt-4">
                            <p class="text-xs text-gray-500"><?= htmlspecialchars($wikie['created_at']) ?></p>
                            <a href="wikie.php?id=<?= htmlspecialchars($wikie['id']) ?>" class="text-blue-600 hover:text-blue-700 transition-colors duration-200">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div class="mt-8 mb-4 flex flex-wrap items-center justify-between space-x-4">
            <h1 class="text-3xl font-bold text-gray-800 capitalize dark:text-white lg:text-4xl">Recent Posts</h1>
            
            <div class="mb-4 lg:mb-0 w-full lg:w-auto">
                <input id="search_Ajax" type="text" name="title" placeholder="Search posts..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg" aria-label="Search posts" />
            </div>
            
            <div class="mb-4 lg:mb-0 w-full lg:w-auto">
                <select name="categories-id" id="categories-id" class="block w-full shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg" aria-label="Filter by category">
                    <?php foreach ($categories_result as $categorie) : ?>
                        <option value="<?= htmlspecialchars($categorie['id']) ?>"><?= htmlspecialchars($categorie['title']) ?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
            
            <div class="mb-4 lg:mb-0 w-full lg:w-auto">
                <select name="tags-id" id="tags-id" class="block w-full shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg" aria-label="Filter by tag">
                    <?php foreach ($tags_result as $tag) : ?>
                        <option value="<?= htmlspecialchars($tag['id']) ?>"><?= htmlspecialchars($tag['title']) ?></option>
                    <?php endforeach ; ?>
                </select>
            </div>
        </div>


        <hr class="my-8 border-gray-200 dark:border-gray-700">
        <div id="search-posts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">

        </div>
    </div>
  </section>
</div>
<footer class="bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-4 py-8">
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
        <div class="text-center text-gray-500 text-sm mt-8">
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
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out transform hover:-translate-y-1 m-4">
                        <img class="object-cover object-center w-full h-64 lg:h-80 rounded-t-lg" src="./img/Best-times-to-post-2022_BTTP-Social-Media.svg" alt="">

                        <div class="p-6">
                            <span class="inline-block bg-blue-100 text-blue-500 uppercase tracking-wide text-sm font-semibold rounded px-2 py-1">${wikie.categories_title}</span>

                            <h2 class="mt-4 text-2xl font-bold text-gray-800 hover:text-gray-600 transition-colors duration-200">
                                ${wikie.title}
                            </h2>

                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
                                ${wikie.content.substring(0, 200)}...
                            </p>

                            <div class="flex items-center justify-between mt-4">
                                <p class="text-xs text-gray-500">${wikie.created_at}</p>
                                <a href="#" class="text-blue-600 hover:text-blue-700 underline transition-colors duration-200">Read more</a>
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
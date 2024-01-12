<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <?php include_once 'navbar.php' ?>
    <section>
        <div class="flex justify-center text-5xl pt-10">
            <h1>Add Category</h1>
        </div>
        <div class="w-6/12 mx-auto mt-10">
            <form action="./../../app/Controller/Categoriescontroller.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Title of the Category:</label>
                    <input type="text" name="title" id="title" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" />
                </div>
                <button type="submit" name="add-categorie" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 text-lg">
                    Add Category
                </button>
            </form>
        </div>
    </section>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <nav class="flex justify-between items-center bg-blue-500 text-white h-14 text-lg">
        <div class="text-2xl font-bold pl-10 cursor-pointer">LOGO</div>
        <div>
            <ul class="flex gap-7 font-semibold">
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manageusers.php">Manage User</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer">Manage Categories</li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer">Manage Wikies</li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer">Manage Tags</li>
            </ul>
        </div>
        <div class="pr-10">
            <a class="bg-red-600 hover:bg-red-400 py-1 px-2 rounded-md cursor-pointer" href="Logout.php">Logout</a>
        </div>
    </nav>
    <section>
        <div class="flex justify-center text-5xl pt-10">
            <h1>Edit user</h1>
        </div>
        <div class="w-6/12 mx-auto mt-10">
            <form action="./../app/Controller/Usercontroller.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">First Name:</label>
                    <span id="firstname" class="text-gray-700 text-lg">[User's First Name]</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Last Name:</label>
                    <span id="lastname" class="text-gray-700 text-lg">[User's Last Name]</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2">Email:</label>
                    <span id="email" class="text-gray-700 text-lg">[User's Email]</span>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-lg font-bold mb-2">Role:</label>
                    <select name="role" id="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg">
                        <option value="writer">Writer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" name="update-User-Role" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500 text-lg">
                    Update User
                </button>
            </form>
        </div>
    </section>
</body>
</html>
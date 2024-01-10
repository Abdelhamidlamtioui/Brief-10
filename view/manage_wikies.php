<?php
require_once __DIR__ . "/../vendor/autoload.php";
use APP\Controller\Usercontroller;
session_start();
$getall= new Usercontroller;
$results=$getall->findAll($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="flex justify-between items-center bg-blue-500 text-white h-14 text-lg">
        <div class="text-2xl font-bold pl-10 cursor-pointer">LOGO</div>
        <div>
            <ul class="flex gap-7 font-semibold">
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Users.php">Manage User</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Categories.php">Manage Categories</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Wikies.php">Manage Wikies</a></li>
                <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Tags.php">Manage Tags</a></li>
            </ul>
        </div>
        <div class="pr-10">
            <a class="bg-red-600 hover:bg-red-400 py-1 px-2 rounded-md cursor-pointer" href="Logout.php">Logout</a>
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
                        <th class="px-4 py-2 border">Fullname</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Role</th>
                        <th class="px-4 py-2 border"></th>
                        <th class="px-4 py-2 border"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) :?>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2"><?= $result['firstname'] .' '.$result['lastname'] ?></td>
                        <td class="border px-4 py-2"><?= $result['email'] ?></td>
                        <td class="border px-4 py-2"><?php echo $cal = ($result['is_admin']===0) ? "writer" : "Admin" ; ?></td>
                        <td class="border px-4 py-2">
                            <form method="post" action="./../app/Controller/Usercontroller.php?id=<?= $result['id'] ?>">
                                <button name="delete-user" class="bg-red-600 hover:bg-red-400 text-white py-1 px-2 rounded-md cursor-pointer">
                                    DELETE
                                </button>
                            </form>
                        </td>
                        <td class="border px-4 py-2">
                            <a class="bg-green-600 hover:bg-green-400 text-white py-1 px-2 rounded-md cursor-pointer" href="update_User.php?id=<?= $result['id'] ?>">
                                Edit Role
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
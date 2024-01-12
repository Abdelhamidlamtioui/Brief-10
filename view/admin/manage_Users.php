<?php
require_once __DIR__ . "/../../vendor/autoload.php";
use APP\Controller\Usercontroller;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <?php include_once 'navbar.php' ?>
    <section>
        <div class="flex justify-center text-5xl pt-10">
            <h1>Manage Users</h1>
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
                            <form method="post" action="./../../app/Controller/Usercontroller.php?id=<?= $result['id'] ?>">
                                <button name="delete-user" class="bg-red-600 hover:bg-red-400 text-white py-1 px-2 rounded-md cursor-pointer">
                                    DELETE
                                </button>
                            </form>
                        </td>
                        <td class="border px-4 py-2">
                            <a class="bg-green-600 hover:bg-green-400 text-white py-1 px-2 rounded-md cursor-pointer" href="edit_User.php?id=<?= $result['id'] ?>">
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
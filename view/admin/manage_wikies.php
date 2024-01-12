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
</head>
<body>
    <?php include_once 'navbar.php' ?>
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
                        <th class="px-4 py-2 border">Is It archived</th>
                        <th class="px-4 py-2 border">Wikie date</th>
                        <th class="px-4 py-2 border">User id</th>
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
                        <td class="border px-4 py-2"><?= $retVal = ($result['visibility']===1) ? 'No Its not archived' : 'Its archived' ; ?></td>
                        <td class="border px-4 py-2"><?= $result['created_at']?></td>
                        <td class="border px-4 py-2"><?= $result['author_id']?></td>
                        <td class="border px-4 py-2"><?= $result['category_id']?></td>
                        <td class="border px-4 py-2">
                            <form method="post" action="./../../app/Controller/Wikiescontroller.php?id=<?= $result['id'] ?>">
                                <button name="archive-wikie" class="bg-red-600 hover:bg-red-400 text-white py-1 px-2 rounded-md cursor-pointer">
                                    Archive
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
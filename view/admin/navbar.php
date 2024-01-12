<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['role'])&&$_SESSION['role']===1) {
    
}else {
    header('location:./../index.php');
}
?>
<nav class="flex justify-between items-center bg-blue-500 text-white h-14 text-lg">
    <div class="text-2xl font-bold pl-10 cursor-pointer"><a href="dashboard.php">LOGO</a></div>
    <div>
        <ul class="flex gap-7 font-semibold">
            <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Users.php">Manage User</a></li>
            <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Categories.php">Manage Categories</a></li>
            <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Wikies.php">Manage Wikies</a></li>
            <li class="hover:bg-blue-300 px-1 cursor-pointer"><a href="manage_Tags.php">Manage Tags</a></li>
        </ul>
    </div>
    <div class="pr-10">
        <form method="post" action="./../../app/Controller/Usercontroller.php">
            <button name="log-out" class="bg-red-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 transition duration-150 ease-in-out">Logout</button>
        </form>
    </div>
</nav>
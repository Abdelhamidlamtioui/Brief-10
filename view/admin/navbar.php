<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['role'])&&$_SESSION['role']===1) {
    
}else {
    header('location:./../index.php');
}
?>
<nav class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-3 md:justify-start md:space-x-10">
            
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="dashboard.php" class="text-3xl font-bold text-white hover:text-gray-300 flex items-center">
                    BLOGO
                </a>
            </div>
            
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="manage_Users.php" class="whitespace-nowrap text-base font-medium text-white hover:text-gray-300 px-4 py-2 flex items-center">
                    <i class="fas fa-users-cog mr-2"></i>Manage Users
                </a>
                <a href="manage_Categories.php" class="whitespace-nowrap text-base font-medium text-white hover:text-gray-300 px-4 py-2 flex items-center">
                    <i class="fas fa-layer-group mr-2"></i>Manage Categories
                </a>
                <a href="manage_Wikies.php" class="whitespace-nowrap text-base font-medium text-white hover:text-gray-300 px-4 py-2 flex items-center">
                    <i class="fas fa-book-open mr-2"></i>Manage Wikies
                </a>
                <a href="manage_Tags.php" class="whitespace-nowrap text-base font-medium text-white hover:text-gray-300 px-4 py-2 flex items-center">
                    <i class="fas fa-tags mr-2"></i>Manage Tags
                </a>
            </div>
            <div class="pr-4">
            <form method="post" action="./../../app/Controller/Usercontroller.php">
                <button name="log-out" class="inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </form>
        </div>
    </div>
</nav>
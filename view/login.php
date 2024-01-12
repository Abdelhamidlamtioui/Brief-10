<?php if (session_status()==PHP_SESSION_NONE) {
    session_start();
} 
if (isset($_SESSION['role'])) {
    header('location:./index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
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
                            <a href="./login.php" class="bg-blue-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">signup</a>
                        <?php endif; ?>
                  </div>
              </div>
          </div>
      </div>
    </nav>
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md p-8 space-y-3 rounded-xl bg-white shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-700">Login</h2>
            <?php if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])): ?>
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    <?php 
                        echo '<p>' . htmlspecialchars($_SESSION['login_error']) . '</p>';
                        unset($_SESSION['login_error']);
                    ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['registration_succeeded'])): ?>
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <?php 
                    echo htmlspecialchars($_SESSION['registration_succeeded']);
                    unset($_SESSION['registration_succeeded']);
                    ?>
                </div>
            <?php endif; ?>
            <form id="loginForm" action="./../app/Controller/Usercontroller.php" method="POST">
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="text" id="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Enter your username">
                    <span id="emailError" class="text-xs text-red-600"></span>
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" id="password" name="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Enter your password">
                    <span id="passwordError" class="text-xs text-red-600"></span>
                </div>
                <button type="submit" name="login-form" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    Sign in
                </button>
            </form>
            <p class="text-center mt-4">
                New here?
                <a href="signup.php" class="text-blue-600 hover:underline">Create an account</a>
            </p>
        </div>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            let hasError = false;

            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

            if (!email || !email.includes('@')) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address.';
                hasError = true;
            }

            if (!password) {
                document.getElementById('passwordError').textContent = 'Please enter your password.';
                hasError = true;
            }

            if (hasError) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>

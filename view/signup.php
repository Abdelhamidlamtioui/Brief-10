<?php if (session_status()==PHP_SESSION_NONE) {
    session_start();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="flex items-center justify-center h-screen px-4">
        <div class="w-full max-w-lg p-8 space-y-3 rounded-xl bg-white shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-700">Sign Up</h2>
            <?php if (isset($_SESSION['registration_errors']) && !empty($_SESSION['registration_errors'])): ?>
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                    <?php 
                    foreach ($_SESSION['registration_errors'] as $error) {
                        echo '<p>' . htmlspecialchars($error) . '</p>';
                    }
                    unset($_SESSION['registration_errors']);
                    ?>
                </div>
            <?php endif; ?>
            <form id="signupForm" action="./../app/Controller/Usercontroller.php" method="post">
                <div class="grid gap-6 sm:grid-cols-2">
                <div class="mb-4">
                    <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                    <input value="<?php echo isset($_SESSION['form_data']['firstname']) ? htmlspecialchars($_SESSION['form_data']['firstname']) : ''; ?>" type="text" id="first-name" name="first-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="First Name">
                    <span id="firstNameError" class="text-xs text-red-600"></span>
                </div>
                <div class="mb-4">
                    <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                    <input value="<?php echo isset($_SESSION['form_data']['lastname']) ? htmlspecialchars($_SESSION['form_data']['lastname']) : ''; ?>" type="text" id="last-name" name="last-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Last Name">
                    <span id="lastNameError" class="text-xs text-red-600"></span>
                </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; unset($_SESSION['form_data'])?>" type="text" id="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Email">
                    <span id="emailError" class="text-xs text-red-600"></span>
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" id="password" name="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Password">
                    <span id="passwordError" class="text-xs text-red-600"></span>
                </div>

                <div class="mb-6">
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Confirm Password">
                    <span id="confirm-passwordError" class="text-xs text-red-600"></span>
                </div>

                <button type="submit" name="register-form" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    Sign Up
                </button>
            </form>
            <p class="text-center mt-4">
                Already have an account?
                <a href="login.php" class="text-blue-600 hover:underline">Sign in</a>
            </p>
        </div>
    </div>
    <script>
            document.getElementById('signupForm').addEventListener('submit', function(event) {
                let hasError = false;

                document.getElementById('firstNameError').textContent = '';
                document.getElementById('lastNameError').textContent = '';
                document.getElementById('emailError').textContent = '';
                document.getElementById('passwordError').textContent = '';
                document.getElementById('confirm-passwordError').textContent = '';
                
                let firstName = document.getElementById('first-name').value;
                let lastName = document.getElementById('last-name').value;
                let email = document.getElementById('email').value;
                let password = document.getElementById('password').value;
                let confirmPassword = document.getElementById('confirm-password').value;

                if (!firstName) {
                    document.getElementById('firstNameError').textContent = 'Please enter your first name.';
                    hasError = true;
                }
                if (!lastName) {
                    document.getElementById('lastNameError').textContent = 'Please enter your last name.';
                    hasError = true;
                }
                if (!email || !email.includes('@')) {
                    document.getElementById('emailError').textContent = 'Please enter a valid email address.';
                    hasError = true;
                }
                if (password.length < 8) {
                    document.getElementById('passwordError').textContent = 'Password must be at least 8 characters.';
                    hasError = true;
                }
                if (password !== confirmPassword) {
                    document.getElementById('confirm-passwordError').textContent = 'Passwords do not match.';
                    hasError = true;
                }

                if (hasError) {
                    event.preventDefault();
                }
            });
        </script>
</body>
</html>

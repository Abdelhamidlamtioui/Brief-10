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
            <form action="./../app/Controller/Usercontroller.php" method="post">
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="mb-4">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                        <input type="text" id="first-name" name="first-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="First Name">
                    </div>
                    <div class="mb-4">
                        <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" id="last-name" name="last-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Last Name">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Email">
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" id="password" name="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Password">
                </div>

                <div class="mb-6">
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Confirm Password">
                </div>

                <button type="submit" name="register-form" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    Sign Up
                </button>
            </form>
        </div>
    </div>
</body>
</html>

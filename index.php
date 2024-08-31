<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </link>
</head>

<body>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
    <div class="max-w-md w-full space-y-8">
      <div>
        <!-- <img class="mx-auto h-12 w-auto" src="https://placehold.co/100x100" alt="Company Logo Placeholder Image"> -->
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
      </div>
      <form class="space-y-6" action="includes/login.php" method="POST" onsubmit="return validateForm()">
        <div class="rounded-md shadow-sm -space-y-px">
          <div class="mb-2">
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
          </div>
          <div class="mb-2">
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
          </div>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
          <div id="error" class="bg-red-100 border border-red-200 text-red-800 p-4 mb-4 rounded-md shadow-md">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
          </div>
          <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="relative">
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Icon or content here -->
            </span>
            Sign in
          </button>
          <div class="flex justify-end mt-2">
            <a href="register.php" class="text-black hover:text-gray-700 underline text-sm">
              Register
            </a>
          </div>
        </div>

      </form>





    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const error = document.getElementById('error');

      setTimeout(() => {
        error.style.display = 'none';
      }, 4000);
    })
  </script>

</body>

</html>
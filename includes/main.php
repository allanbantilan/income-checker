<?php
// Get the current page's URI
$current_page = basename($_SERVER['REQUEST_URI']);

// Set the default title
$page_title = "Income Checker System";

// Change the title based on the page
if ($current_page == 'dashboard.php') {
    $page_title = "Dashboard";
} elseif ($current_page == 'add_income.php') {
    $page_title = "Add Income";
} elseif ($current_page == 'add_spendings.php') {
    $page_title = "Add Spending";
    // Add more conditions as needed
}
?>

<!-- Main Content -->
<main class="flex-1 p-4 md:p-8">


    <header class="bg-white shadow-md mb-4 md:mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-2xl font-bold text-indigo-600"><?php echo $page_title; ?></a>
                </div>

                <!-- User Icon -->
                <!-- Main Button to Trigger the Drawer -->
                <div class="relative flex items-center space-x-4">
                    <a href="#" id="profileIcon" class="text-gray-700 hover:text-indigo-600">
                        <i class="fas fa-user-circle text-2xl"></i>
                    </a>

                    <!-- Drawer Container -->
                    <div id="drawer" class="fixed top-0 right-24 mt-12 mr-4 bg-white border border-gray-300 shadow-lg rounded-md w-34 hidden z-50 transition-transform transform opacity-0 translate-y-2">
                        <ul class="flex flex-col p-2 space-y-2">
                        
                            <li>
                                <form action="../includes/logout.php" method="POST" class="inline">
                                    <button type="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 bg-transparent border-0">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>


            </nav>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const profileIcon = document.getElementById('profileIcon');
                const drawer = document.getElementById('drawer');

                profileIcon.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevents the default link behavior

                    if (drawer.classList.contains('hidden')) {
                        // Show the drawer with animation
                        drawer.classList.remove('hidden');
                        setTimeout(() => {
                            drawer.classList.remove('opacity-0', 'translate-y-2');
                            drawer.classList.add('opacity-100', 'translate-y-0');
                        }, 10);
                    } else {
                        // Hide the drawer with animation
                        drawer.classList.remove('opacity-100', 'translate-y-0');
                        drawer.classList.add('opacity-0', 'translate-y-2');
                        setTimeout(() => {
                            drawer.classList.add('hidden');
                        }, 300); // Duration of the animation
                    }
                });

                // Optional: Close the drawer when clicking outside of it
                document.addEventListener('click', function(event) {
                    if (!drawer.contains(event.target) && !profileIcon.contains(event.target)) {
                        drawer.classList.remove('opacity-100', 'translate-y-0');
                        drawer.classList.add('opacity-0', 'translate-y-2');
                        setTimeout(() => {
                            drawer.classList.add('hidden');
                        }, 300); // Duration of the animation
                    }
                });
            });
        </script>


    </header>
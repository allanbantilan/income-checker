

<aside class="bg-white w-full md:w-64 min-h-screen shadow-md">
    <div class="text-center mt-4">
        <h1 class="text-2xl font-bold text-indigo-600">INCOME CHECKER</h1>
    </div>
    <nav class="mt-4">
        <a href="../main/dashboard.php" class="flex items-center p-4 text-gray-700 hover:bg-gray-200 <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'bg-indigo-100 text-indigo-600' : ''; ?>">
            <i class="fas fa-tachometer-alt mr-3"></i> Overview
        </a>
        <a href="../main/add_income.php" class="flex items-center p-4 text-gray-700 hover:bg-gray-200 <?php echo (basename($_SERVER['PHP_SELF']) == 'add_income.php') ? 'bg-indigo-100 text-indigo-600' : ''; ?>">
            <i class="fas fa-chart-line mr-3"></i> Add Income
        </a>
        <a href="../main/add_spendings.php" class="flex items-center p-4 text-gray-700 hover:bg-gray-200 <?php echo (basename($_SERVER['PHP_SELF']) == 'add_spendings.php') ? 'bg-indigo-100 text-indigo-600' : ''; ?>">
            <i class="fas fa-file-invoice-dollar mr-3"></i> Add Spendings
        </a>
        <a href="#" class="flex items-center p-4 text-gray-700 hover:bg-gray-200">
            <i class="fas fa-cogs mr-3"></i> Settings
        </a>
    </nav>
</aside>
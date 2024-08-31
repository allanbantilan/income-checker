<?php
include '../includes/auth.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="../output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 flex flex-col md:flex-row">

    <?php
    include '../includes/sidebar.php';
    ?>


    <?php
    include '../includes/main.php';
    ?>
    <?php if (isset($_SESSION['login_message'])): ?>
        <div id="greetings" class="bg-green-100 border border-green-200 text-green-800 p-4 mb-4 rounded-md shadow-md ">
            <?php echo htmlspecialchars($_SESSION['login_message']); ?>
        </div>
        <?php unset($_SESSION['login_message']); ?>
    <?php endif; ?>


    <?php
    include '../includes/db_connect.php';

    // Query to sum income for the current day
    $query = $conn->query("
    SELECT SUM(income) AS total_income 
    FROM income 
    WHERE DATE(income_date) = CURDATE()");

    $incomeData = $query->fetch_assoc();
    
    $totalIncome = $incomeData['total_income'] ? $incomeData['total_income'] : 0;
    ?>
    <?php
    include '../includes/db_connect.php';

    // Query to sum income for the current day
    $query = $conn->query("
    SELECT SUM(spending_cost) AS total_cost 
    FROM spending 
    WHERE DATE(spending_date) = CURDATE()");

    $costData = $query->fetch_assoc();

    $totalCost = $costData['total_cost'] ? $costData['total_cost'] : 0;
    ?>


    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-8">
        <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">

            <h2 class="text-xl font-semibold text-gray-700">Current Income (this day)</h2>
            <p class="text-2xl font-bold text-green-600 mt-2 md:mt-4">₱<?= number_format($totalIncome); ?></p>

        </div>
        <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700">Money Spent (this day)</h2>
            <p class="text-2xl font-bold text-red-600 mt-2 md:mt-4">₱<?= number_format($totalCost) ?></p>
        </div>
    </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const greetings = document.getElementById('greetings');
            if (greetings) {
                setTimeout(() => {
                    greetings.style.display = 'none';
                }, 5000);

            }

        });
    </script>


</body>

</html>
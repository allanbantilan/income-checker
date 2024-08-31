<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $itemType = $_POST['itemType'] ?? '';
    $income = isset($_POST['income']) ? intval($_POST['income']) : 0;;


    $stmt = $conn->prepare("INSERT INTO INCOME (income_type, income, income_date) VALUES (?,?,NOW())");
    $stmt->bind_param("si", $itemType, $income );
                        

    if ($stmt->execute()) {
        echo "<script>
            alert('Added Successfully');
            window.location.href = '../main/add_income.php';
        </script>";
    } else {
        echo "<script>
            alert('Error: " . $stmt->error . "');
            window.location.href = '../main/add_income.php';
        </script>";
    }
    $stmt->close();
    $conn->close();

}

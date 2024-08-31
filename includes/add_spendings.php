<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemType = $_POST['itemType'];
    $cost = $_POST['cost'];

    $stmt = $conn->prepare("INSERT INTO SPENDING (spending_type, spending_cost, spending_date) VALUES (?, ?, now())");
    $stmt->bind_param('si', $itemType, $cost);


    if ($stmt->execute()) {
        echo "<script>
        alert('Speding Added Succesully');
        window.location.href = '../main/add_spendings.php';
        </script>";
    } else {
        echo "<script>
        alert('Error : " . $stmt->error . " ');
        </script>";
    }
}

$stmt->close();
$conn->close();

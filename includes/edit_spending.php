<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $itemType = $_POST['editItemType'];
    $cost = $_POST['editCost'];
    $id = $_POST['editId'];

    $stmt = $conn->prepare('UPDATE spending SET spending_type = ?, spending_cost = ? WHERE spend_id = ?');
    $stmt->bind_param('sii', $itemType, $cost, $id);

    if ($stmt->execute()) {
        echo "<script>
        alert('Record Edited Succesfully');
        window.location.href = '../main/add_spendings.php';
        </script>";
    } else  {
        echo "Error : " . $stmt->error;
    }

}
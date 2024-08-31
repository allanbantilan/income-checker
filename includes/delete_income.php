<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['deleteId'];

    $stmt = $conn->prepare('DELETE FROM income WHERE income_id = ?');
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "<script>
        alert('Income deleted Succesfully');
        window.location.href = '../main/add_income.php';
        </script>";
    } else {
        echo "Error deleing record : " . $stmt->error;
    }
}

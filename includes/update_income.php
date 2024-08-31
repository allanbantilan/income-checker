<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $itemType = $_POST['editItemType'];
    $income = $_POST['editIncome'];
    $id = $_POST['editId'];


    $stmt = $conn->prepare('UPDATE INCOME SET income_type = ?, income = ? WHERE income_id = ?');
    $stmt->bind_param('sii', $itemType, $income, $id);

    
    if($stmt->execute()){
        echo "<script>
        alert('Income Edited Succesfully');
        window.location.href = '../main/add_income.php';
        </script>";
    } else {
        echo "Error updating record : " . $stmt->error;

    }

    $conn->close();
    $stmt->close();

}
<?php 

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['deleteId'];

    $stmt = $conn->prepare('DELETE FROM spending WHERE spend_id = ?');
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "<script>
        alert('Record Deleted Succesfully');
        window.location.href = '../main/add_spendings.php';
        </script>";
    } else  {
        echo "Error : " . $stmt->error;
    }

    $conn->close();
    $stmt->close();

}
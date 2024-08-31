<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?,?,?)");
    $stmt->bind_param('sss', $name, $email, $password);

    if ($stmt->execute()) {
        echo "<script>
            alert('Account Created! Use your Email and Password to Login');
            window.location.href = '../index.php'

        </script>";
    } else {
        echo "Error : " . $stmt->error;
    }

    $conn->close();
    $stmt->close();


}
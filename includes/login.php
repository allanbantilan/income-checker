<?php

session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param('ss', $email, $pass);

    $stmt->execute();

    $stmt->bind_result($id, $name);
    $stmt->fetch();

    if ($id) {
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $id;
        $_SESSION['login_message'] = 'Welcome ' . $name;
        header('Location: ../main/dashboard.php');
        exit();
    } else {
        $_SESSION['error'] = 'Those credentials didnt match our records';
        header('Location: ../index.php'); 
        exit();
    }
}
$stmt->close();
$conn->close();

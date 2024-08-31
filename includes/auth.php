<?php
session_start();

if (!isset($_SESSION['auth'])) {
    echo "<script>
        alert('You need to sign in before proceding to this page.');
        window.location.href = '../index.php'; 
    </script>";
}
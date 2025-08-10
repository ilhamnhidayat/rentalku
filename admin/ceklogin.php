<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tbadmin WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $data = mysqli_fetch_assoc($result);

    if (password_verify($password, $data['hashadmin'])) {
        $_SESSION['login_success'] = true;
        $_SESSION['idadmin'] = $data['idadmin'];
        $_SESSION['username'] = $data['username'];
        header("Location: admin.php"); // pastikan file ini ada
        exit;
    }
}

$_SESSION['login_failed'] = true;
header("Location: login.php");
exit;

<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

$result = mysqli_query($conn, "SELECT * FROM users WHERE login='$login'");
$user = mysqli_fetch_assoc($result);


if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id_user'];
    $_SESSION['login']   = $user['login'];
    header("Location: dashboard.php");
    exit;
} else {
    echo "Неверный логин или пароль";
}
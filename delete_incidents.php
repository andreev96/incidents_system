<?php
session_start();
include "db.php";

// защита: только авторизованные
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// проверка id
if (!isset($_GET['id'])) {
    header("Location: incidents.php");
    exit;
}

$id = (int)$_GET['id'];

$sql = "DELETE FROM incidents WHERE id_incident = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: incidents.php");
exit;

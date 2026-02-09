<?php session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Панель</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Панель управления</h1>
<div class="nav">
<a href="incidents.php">Инциденты</a>
<a href="type_incident.php">Типы инцидентов</a>
<a href="system.php">Системы</a>
<a href="logout.php">Выход</a>
</div>
<p>Пользователь: <b><?= htmlspecialchars($_SESSION['login'] ?? '') ?></b></p>
</div></body></html>

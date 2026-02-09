<?php 
session_start();
include 'db.php';
if($_POST){ 
    mysqli_query($conn,"INSERT INTO systems(id_user ,system_name,description)
    VALUES('$_SESSION[user_id]','$_POST[name]','$_POST[description]')");
    header("Location:system.php");
}?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Новая система</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Добавить систему</h1>
<form method="post">
<input name = "name" placeholder = "Название системы">
<textarea name="description" required placeholder = "Описание системы"></textarea>
<button>Добавить</button>
</form>
<a href="system.php">Назад</a>
</div></body></html>
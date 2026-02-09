<?php 
session_start();
include 'db.php';
if($_POST){ 
    mysqli_query($conn,"INSERT INTO incident_types(id_user,type_name,description,priority)
    VALUES('$_SESSION[user_id]','$_POST[name]','$_POST[description]','$_POST[priority]')");
    header("Location:type_incident.php");
}?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Новый тип инцидента</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Добавить тип</h1>
<form method="post">
<input name = "name" placeholder = "Название инцидента">
<textarea name="description" required placeholder = "Описание типа"></textarea>
<h3>Приоритет:</h3>
<select name = "priority">
  <option>Высокий</option>
  <option>Средний</option>
  <option>Низкий</option>
</select></br></br>
<button>Добавить</button>
</form>
<a href="type_incident.php">Назад</a>
</div></body></html>
<?php 
session_start();
include 'db.php';
$g = (int)$_GET['id_type'];
if($_POST){ 
    mysqli_query($conn,"UPDATE incident_types SET type_name = '$_POST[name]', description = '$_POST[description]' , priority = '$_POST[priority]' WHERE id_type = $g");
    header("Location:type_incident.php");
};
$result = mysqli_query($conn,"SELECT * FROM incident_types WHERE id_type = $g");
$system = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Изменение типа</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Изменить данные о типе инцидента</h1>
<form method="post">
<h3>Название типа:</h3>
<input name = "name" placeholder = "Название типа" value = "<?= $system['type_name'] ?>">
<h3>Описание типа:</h3>
<textarea name="description" required placeholder = "Описание типа"><?= $system['description'] ?></textarea>
<h3>Приоритет:</h3>
<select name = "priority">
  <option>Высокий</option>
  <option>Средний</option>
  <option>Низкий</option>
</select></br></br>
<button>Изменить</button>
</form>
<a href="type_incident.php">Назад</a>
</div></body></html>
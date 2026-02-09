<?php 
session_start();
include 'db.php';
$g = (int)$_GET['id_system'];
if($_POST){ 
    mysqli_query($conn,"UPDATE systems SET system_name = '$_POST[name]', description = '$_POST[description]' WHERE id_system = $g");
    header("Location:system.php");
};
$result = mysqli_query($conn,"SELECT * FROM systems WHERE id_system = $g");
$system = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Изменение системы</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Изменить данные о системе</h1>
<form method="post">
<h3>Название системы:</h3>
<input name = "name" placeholder = "Название системы" value = "<?= $system['system_name'] ?>">
<h3>Описание системы:</h3>
<textarea name="description" required placeholder = "Описание системы"><?= $system['description'] ?></textarea>
<button>Изменить</button>
</form>
<a href="system.php">Назад</a>
</div></body></html>
<?php session_start();include 'db.php'; $r=mysqli_query($conn,"SELECT * FROM incident_types"); ?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Типы</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
</head><body>
<div class="container">
<h1>Типы инцидентов</h1>
<div class="nav">
<a href="add_type.php">Добавить</a>
<a href="dashboard.php">Назад</a>
</div>
<table>
<tr><th>ID</th><th>Тип</th><th>Описание</th><th>Приоритет</th><th></th></tr>
<?php while($row=mysqli_fetch_assoc($r)){ 
   if($row['id_user'] == $_SESSION['user_id']){
?>
<tr>
<td><?= $row['id_type'] ?></td>
<td><?= $row['type_name'] ?></td>
<td><?= $row['description']?></td>
<td><?= $row['priority']?></td>
<td>
   <a href = "update_type.php?id_type=<?= $row['id_type'] ?>">
   Изменить
   </a>
</td>
<td>
    <a href="delete_type.php?id_type=<?= $row['id_type'] ?>"
        onclick="return confirm('Вы уверены, что хотите удалить тип?');"
        style="color:red; margin-left:10px;">
        Удалить
    </a>
</td>
<?php }} ?>
</table>
</div></body></html>
<?php session_start();include 'db.php'; $r=mysqli_query($conn,"SELECT * FROM systems"); ?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Системы</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
</head><body>
<div class="container">
<h1>Системы</h1>
<div class="nav">
<a href="add_system.php">Добавить</a>
<a href="dashboard.php">Назад</a>
</div>
<table>
<tr><th>ID</th><th>Система</th><th>Описание</th><th></th><th></th></tr>
<?php while($row=mysqli_fetch_assoc($r)){ 
   if($row['id_user'] == $_SESSION['user_id']){
?>
<tr>
<td><?= $row['id_system'] ?></td>
<td><?= $row['system_name'] ?></td>
<td><?= $row['description']?></td>
<td>
   <a href = "update_system.php?id_system=<?= $row['id_system'] ?>">
   Изменить
   </a>
</td>
<td>
    <a href="delete_system.php?id_system=<?= $row['id_system'] ?>"
        onclick="return confirm('Вы уверены, что хотите удалить систему?');"
        style="color:red; margin-left:10px;">
        Удалить
    </a>
</td>
<?php }} ?>
</table>
</div></body></html>
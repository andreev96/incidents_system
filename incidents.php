<?php session_start();include 'db.php'; $r=mysqli_query($conn,"SELECT * FROM incidents"); ?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Инциденты</title>
<link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
</head><body>
<div class="container">
<h1>Инциденты</h1>
<div class="nav">
<a href="add_incident.php">Добавить</a>
<a href="dashboard.php">Назад</a>
</div>
<table>
<tr><th>ID</th><th>Инцидент</th><th>Описание</th><th>Статус</th><th></th></tr>
<?php while($row=mysqli_fetch_assoc($r)){ 
   if($row['id_users'] == $_SESSION['user_id']){
?>
<tr>
<td><?= $row['id_incident'] ?></td>
<td><?= $row['name_incidents'] ?></td>
<td><?= $row['description'] ?></td>
<td class="<?= $row['status']=='open'?'status-open':'status-closed' ?>">
<?= $row['status'] ?></td>
<td>
<?php if($row['status']=='open'){ ?>
<a href="close_incident.php?id=<?= $row['id_incident'] ?>" onclick="return confirmClose()">Закрыть</a>
<?php } ?>
<a href="delete_incidents.php?id=<?= $row['id_incident'] ?>"
   onclick="return confirm('Вы уверены, что хотите удалить инцидент?');"
   style="color:red; margin-left:10px;">
   Удалить
</a>
</td></tr>
<?php }} ?>
</table>
</div></body></html>

<?php 
session_start();
include 'db.php';
if($_POST){ 
    if(isset($_POST['system_id']) && isset($_POST['type_id'])){
    mysqli_query($conn,"INSERT INTO incidents(description,status,id_users,name_incidents,id_system,created_at,id_type)
    VALUES('$_POST[description]','open','$_SESSION[user_id]','$_POST[name]','$_POST[system_id]',NOW(),'$_POST[type_id]')");
    header("Location:incidents.php");
    } else {
        ?><script>alert("Не создана система ,либо тип инцидента , перед добавлением инцидента создайте систему и тип инцидента");</script><?php
    }
} ?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Новый инцидент</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Добавить инцидент</h1>
<form method="post">


<input name = "name" placeholder = "Название инцидента">
<textarea name="description" required placeholder = "Описание инцидента"></textarea>
<h3>Выберите систему в которой произошел инцидент:</h3>
<select name = "system_id">
 <?php
        $sql = mysqli_query($conn, "SELECT * FROM systems WHERE id_user = $_SESSION[user_id]");

        while ($type = mysqli_fetch_assoc($sql)) {
            echo "<option value='{$type['id_system']}'>
                    {$type['system_name']}
                  </option>";
        }
    ?>
</select></br></br> 
<h3>Выберите тип инцидента:</h3>       
<select name="type_id" required>
    <?php
        $sql = mysqli_query($conn, "SELECT * FROM incident_types WHERE id_user = $_SESSION[user_id]");

        while ($type = mysqli_fetch_assoc($sql)) {
            echo "<option value='{$type['id_type']}'>
                    {$type['type_name']}
                  </option>";
        }
    ?>
</select></br></br>
                                                  
<button>Добавить</button>
</form>
<a href="incidents.php">Назад</a>
</div></body></html>


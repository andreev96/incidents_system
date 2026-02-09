<?php
session_start();
include "db.php";

// защита: только авторизованные
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// проверка id
if (!isset($_GET['id_type'])) {
    header("Location: type_incident.php");
    exit;
}

$id = (int)$_GET['id_type'];

$sqlt = mysqli_query($conn,"SELECT * FROM incidents WHERE id_users = $_SESSION[user_id]");
while($incident = mysqli_fetch_assoc($sqlt)){
    if($incident['id_type'] == $id){
        echo "<script>
            alert('Есть инциденты с таким типом, перед удалением удалите все инциденты с данным типом');
            window.location.href = 'type_incident.php';
        </script>";
    }
}

$sql = "DELETE FROM incident_types WHERE id_type = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: type_incident.php");
exit;
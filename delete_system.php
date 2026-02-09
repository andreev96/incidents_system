<?php
session_start();
include "db.php";

// защита: только авторизованные
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// проверка id
if (!isset($_GET['id_system'])) {
    header("Location: system.php");
    exit;
}

$id = (int)$_GET['id_system'];

$sqlt = mysqli_query($conn,"SELECT * FROM incidents WHERE id_users = $_SESSION[user_id]");
while($incident = mysqli_fetch_assoc($sqlt)){
    if($incident['id_system'] == $id){
        echo "<script>
            alert('Есть инциденты с таким типом, перед удалением удалите все инциденты с данным типом');
            window.location.href = 'system.php';
        </script>";
    }
}

$sql = "DELETE FROM systems WHERE id_system = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: system.php");
exit;
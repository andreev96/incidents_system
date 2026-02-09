<?php
include 'db.php';
if($_POST){
    if(empty($_POST['name']) && empty($_POST['pass'])){
        
        ?><script>
            alert("Заполните все поля");
            window.location.href = 'register.php';
            </script><?php
    }
    $sql = mysqli_query($conn,"SELECT * FROM users");
    while($a = mysqli_fetch_assoc($sql)){
        if($a['login'] == $_POST['name']){
            ?><script>
            alert("Логин занят , придумайте другой");
            window.location.href = 'register.php';
            </script><?php
        }
    }
    if($_POST['pass'] !== $_POST['pass2']){
        ?><script>
            alert("Ваши пароли отличаются");
            window.location.href = 'register.php';
            </script><?php
    }
    $pass = password_hash( $_POST['pass'], PASSWORD_DEFAULT);
    $login = $_POST['name'];
    mysqli_query($conn,"INSERT INTO users(login,password)
    VALUES('$login','$pass')");
    header("Location:index.php");
}
?>
<!DOCTYPE html><html lang="ru"><head>
<meta charset="UTF-8">
<title>Новая система</title>
<link rel="stylesheet" href="css/style.css">
</head><body>
<div class="container">
<h1>Регистрация</h1>
<form method="post">
<h3>Придумайте логин:</h3></br>
<input name = "name" placeholder = "Логин">
<h3>Придумайте пароль:</h3></br>
<input name = "pass" type = "password" placeholder = "Пароль">
<h3>Повторите пароль:</h3></br>
<input name = "pass2" type = "password" placeholder = "Повторите пароль">
<button>Добавить</button>
</form>
<a href="index.php">Назад</a>
</div></body></html>
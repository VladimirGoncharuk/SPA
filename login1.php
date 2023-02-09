<?php
session_start();
if(!empty($_POST)){
require __DIR__ . '/functions.php';
$login = $_POST['login'] ?? null;

if (existsUser($login)){
setcookie('login',$login);
setcookie('TIMEin',time() + 86400,expires_or_options: time() + 86400);
session_start();
header('Location: /index.php' );
} else{
    $error ='Введите существующий логин для доступа';
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="style.css" rel="stylesheet">
</head>
<body >

<div class="form"> 
<h2 class="copyright">SPA салон ТАЙНЫ ВОСТОКА  </h2>
<br>
<h3>Авторизуйтесь чтобы узнать больше </h3>
    <form action="login1.php" method="post">
        <input name="login" type="text" placeholder="Логин">
        <br>
        <input name="submit" type="submit" value="Войти">

    </form>
    <?php if(isset($error)){?>
<span class="copyright">
<?= $error;?>
</span>
<?php } ?>
</div>    
</body>
</html>
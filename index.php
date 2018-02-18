<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$errors = [];

if (!empty($_POST)) {
    $fileData = file_get_contents('./login.json');
    $users = json_decode($fileData, true);
    foreach ($users as $user) {
        if ($_POST['login'] == $user['login'] && $_POST['password'] == $user['password']) {
            $_SESSION['user'] = $user;
            header('Location: list.php');
            die;
        }
        if (empty($_POST['password'])) {
            $_SESSION['user']['username'] = $_POST['name'];
            $_SESSION['user']['guest'] = 1;
            header('Location: list.php');
            die;
        }
    }
    $errors[] = 'Неверный логин или пароль';
}
foreach ($errors as $error):
    echo $error;
endforeach;

?>


<form method="post" action="" enctype="multipart/form-data">
    <label>Логин</label>
    <input type="text" placeholder="Логин" name="login">
    <label>Пароль</label>
    <input type="password"  placeholder="Пароль" name="password">
    <input type="submit" value="Войти"><br/><br/>
    <label>Войти как гость</label>
    <input type="text"  placeholder="Имя" name="name">
    <input type="submit" value="Войти">
</form>


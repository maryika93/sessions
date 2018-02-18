<?php

if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK && move_uploaded_file($_FILES["userfile"]["tmp_name"], '../sessions/tests/' . $_FILES["userfile"]["name"])) {
        $tess = file_get_contents( '../sessions/tests/' . $_FILES["userfile"]["name"]);
        $test = json_decode($tess, true);
        if ($test[0]['crc'] == "tipikinatestsonlycanberead") {
            echo "<p style='color:blue'> Файл загружен</p>";
            header('Location: http://university.netology.ru/u/mtipikina/sessions/list.php');
        } else {
            echo "<p style='color:red'> Файл не загружен. Неверный формат тестового файла</p>";
        }
    }
}
session_start();
if(($_SESSION['user']['guest']) == 1) {
    header('HTTP/1.0 403 Forbidden');
    die;
}
?>

<form method="post" action="" enctype="multipart/form-data">
    Файл <input type="file" name="userfile"><br/>
    <input type="submit" value="Отправить">
</form>

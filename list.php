

<?php
$filesPath = '../sessions/tests/';
$files = scandir($filesPath);

if (!empty($_GET['delete'])){
    $wayToFile = $filesPath.$_GET['delete'];

    if (file_exists($wayToFile)){
        unlink($wayToFile);
    }
}

foreach ($files as $value)
{
    if ($value !='.' and $value !='..' )
    {
        echo '<li><a href="test_2.php?name='. $value.'">'.$value.'</a></li><br>';

    }
    else{}
}
session_start();
if (($_SESSION['user']['guest']) == 0) {
    echo '<a href="admin.php">Добавить новый тест</a><br/>';
    foreach ($files as $value) {
        if ($value != '.' and $value != '..') {
            echo '<a href="list.php?delete=' . $value . '">Удалить тест ' . $value . '</a><br/>';
        }
    }
}

?>

<?php


if(!isset($_GET['name']) || !file_exists('./tests/' . $_GET['name']))
    die('Invalid test name');
else {
    $tess = file_get_contents('../sessions/tests/' . $_GET['name']);
    $test = json_decode($tess, true);

    if (!empty($_POST)) {
        if (!empty($_POST)) {
            $answer0 = $_POST['answer0'];
            $answer1 = $_POST['answer1'];
            $answer2 = $_POST['answer2'];
            $answer3 = $_POST['answer3'];

            $result = 0;
            if ($answer0 == $test[1]['true']) {
                $result += 25;
            }
            if ($answer1 == $test[2]['true']) {
                $result += 25;
            }
            if ($answer2 == $test[3]['true']) {
                $result += 25;
            }
            if ($answer3 == $test[4]['true']) {
                $result += 25;
            }
            session_start();
            $_SESSION['res'] = $result;
            header('Location: http://university.netology.ru/u/mtipikina/sessions/sertificate.php');
        }
        else{
            echo "Пройдите тест";
        }
    }
}


?>

<form method="post" action="http://university.netology.ru/u/mtipikina/sessions/test_2.php?name=<?=$_GET['name']?>">
    <p><b><?php echo $test[1]['question'] ?> </b><Br/>
        <input type="radio" name="answer0" value=<?= $test[1]['answer1'] ?>> <?= $test[1]['answer1'] ?><Br/>
        <input type="radio" name="answer0" value=<?= $test[1]['answer2'] ?>> <?= $test[1]['answer2'] ?><Br/>
        <input type="radio" name="answer0" value=<?= $test[1]['answer3'] ?>> <?= $test[1]['answer3'] ?>
    </p>
    <p><b><?php echo $test[2]['question'] ?> </b><Br/>
        <input type="radio" name="answer1" value=<?= $test[2]['answer1'] ?>> <?= $test[2]['answer1'] ?><Br/>
        <input type="radio" name="answer1" value=<?= $test[2]['answer2'] ?>> <?= $test[2]['answer2'] ?><Br/>
        <input type="radio" name="answer1" value=<?= $test[2]['answer3'] ?>> <?= $test[2]['answer3'] ?>
    </p>
    <p><b><?php echo $test[3]['question'] ?> </b><Br/>
        <input type="radio" name="answer2" value=<?= $test[3]['answer1'] ?>> <?= $test[3]['answer1'] ?><Br/>
        <input type="radio" name="answer2" value=<?= $test[3]['answer2'] ?>> <?= $test[3]['answer2'] ?><Br/>
        <input type="radio" name="answer2" value=<?= $test[3]['answer3'] ?>> <?= $test[3]['answer3'] ?>
    </p>
    <p><b><?php echo $test[4]['question'] ?> </b><Br/>
        <input type="radio" name="answer3" value=<?= $test[4]['answer1'] ?>> <?= $test[4]['answer1'] ?><Br/>
        <input type="radio" name="answer3" value=<?= $test[4]['answer2'] ?>> <?= $test[4]['answer2'] ?><Br/>
        <input type="radio" name="answer3" value=<?= $test[4]['answer3'] ?>> <?= $test[4]['answer3'] ?>
    </p>
    <input type="submit" name="ready" value="Готово"><Br/>
</form>


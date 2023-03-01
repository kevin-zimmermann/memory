<?php
require('Card.php');
session_start();


// On instancie notre classe Card
if (!isset($card)) {
        for ($i = 0; $i < 4; $i++) {
                $card[$i] = new Card();
            $card[$i]->setId($i);
            $card[$i]->setImage($i . ".png");
            $card[$i]->setState("hide");

        }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <form method="get">
        <!--Génération du tableau-->
        <?php
        $duplicateArray = duplicateArray($card);
        $RA = randomArray($duplicateArray);
        if($RA){
            foreach ($RA as $key => $value) {
                if (isset($_SESSION['clickedImg']['card' . $key])) {
                    $RA[$key]->setState('visible');
                    echo '<tr><img height="100px" src="' . $RA[$key]->getImage() . '">' . '</tr>';


                } else {
                    if (isset($_GET['card' . $key])) {
                        if ($_GET['card' . $key] == "Envoyer" && $RA[$key]->getState() == "hide") {
                            $_SESSION['clickedImg']['card' . $key] = $_GET['card' . $key];
                            header('location:index');
                        }
                    }
                    echo '<tr><input type="submit" name="' . 'card' . $key . '"> <img height="100px" src="back.jpg">' . '</input></tr>';
                }
            }
        }
        ?>
        <button type="submit" name="reset" value="reset">Reset la partie</button>
        <?php

        resetGame();
//        var_dump($_GET);
//
        var_dump($_SESSION);

        function duplicateArray($array){
            $array2 = $array;
            $newArray = array_merge($array2,$array);
            return $newArray;
        }
        function randomArray($array){
            if(empty($_SESSION['random'])) {
                $randomArray = shuffle($array);
                $_SESSION['random'] = $array;
            }
            return $_SESSION['random'];
        }

        function resetGame()
        {
            if (isset($_GET['reset'])) {
                session_unset();
                session_destroy();
                unset($_GET);
                header('location:index');
            }
        }

        ?>
    </form>
</table>

</body>
</html>
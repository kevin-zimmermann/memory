<?php
require('Card.php');
session_start();


// On instancie notre classe Card
if (!isset($card)) {
    for ($i = 0; $i < 4; $i++) {
        $card[$i] = new Card();
        $arrayCard[$i]= [];
        $card[$i]->setId($i);
        $card[$i]->setImage($i . ".png");
        $card[$i]->setState("hide");

        $cardId = $card[$i]->getId();
        $cardImage = $card[$i]->getImage();
        $cardState = $card[$i]->getState();
        $arrayCard[$i] = ["id" => $cardId, "image"=> $cardImage, "state"=> $cardState];


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
        $duplicateArray = duplicateArray($arrayCard);
        $RA = randomArray($duplicateArray);
        $_SESSION['count'] = 0;

        if($RA){
            foreach ($RA as $key => $value) {

                if (isset($_SESSION['clickedImg']['card' . $key])) {
                    echo '<tr><img height="100px" src="' . $value['image'] . '">' . '</tr>';


                } else {
                    if (isset($_GET['card' . $key])) {
                        if ($_GET['card' . $key] == $value['id']) {
                            $_SESSION['clickedImg']['card' . $key] = $_GET['card' . $key];
                            $_SESSION['random'][$key]['state'] = "visible";
                            header('location:index');
                        }

                    }
                    echo '<tr><input type="submit" name="' . 'card' . $key . '" value ="'.$value['id'].'">  <img height="100px" src="back.jpg">' . '</input></tr>';
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


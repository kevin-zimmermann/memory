<?php
require ('Card.php');
session_start();

if(!isset($card)){
for($i=0;$i < 9;$i++){
    $card[$i] = new Card();
    $card[$i]->setId($i);
    $card[$i]->setImage($i.".png");
//    $card[$i]->setState("hide");

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

foreach ($card as $key => $value){
    if(isset($_SESSION['card' . $key])){
        $card[$key]->setState('visible');
        echo '<tr><input type="submit" name="'.'card'.$key.'visible"> <img height="100px" src="'.$card[$key]->getImage().'">'.'</input></tr>';


    }else{
        if(isset($_GET['card'.$key])){
            if($_GET['card'.$key] == "Envoyer") {
                $_SESSION['card' . $key] = $_GET['card' . $key];
                header('location:index');
            }
        }
        echo '<tr><input type="submit" name="' . 'card' . $key . '"> <img height="100px" src="back.jpg">' . '</input></tr>';

    }
}
?>
    <button type="submit" name="reset" value="reset">Reset la partie</button>
        <?php
resetGame();
function resetGame(){
if(isset($_GET['reset']))
{
    session_unset();
    session_destroy();
    unset($_GET);
    header('location:index');
}
}


var_dump($card);
var_dump($_GET);
//unset($_GET);
//session_destroy();
var_dump($_SESSION);


 ?>
    </form>
</table>

</body>
</html>
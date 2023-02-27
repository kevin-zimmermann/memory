<?php
require ('Card.php');
session_start();

for($i=0;$i < 9;$i++){
    $card[$i] = new Card();
    $card[$i]->setId($i);
    $card[$i]->setImage($i.".png");

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
//    echo "<td>hello</td>";
        echo '<tr><input type="submit" name="'.'card'.$key.'"> <img src="'.$card[$key]->getImage().'">'.'</input></tr>';
if(!empty($_GET['card'.$key])){
        if($_GET['card'.$key] == "Envoyer") {
            $_SESSION['card' . $key] = $_GET['card' . $key];
            if ($_GET['card' . $key]) {
                echo '<tr><input type="submit" name="' . 'card' . $key . '"> <img src="back.jpg">' . '</input></tr>';

            } else {
                echo '<tr><input type="submit" name="' . 'card' . $key . '"> <img src="' . $card[$key]->getImage() . '">' . '</input></tr>';

            }
        }


        }
//    for ($x=0; $x < 3; $x++) {
//        echo "<td>";
//
//        echo "</td>";
//    }

}

 ?>
    </form>
</table>

</body>
</html>
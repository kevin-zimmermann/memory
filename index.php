<?php
require ('Card.php');
session_start();
//$cards = [];
$card= new Card();

for($i=0;$i < 9;$i++){

    $_SESSION['id'.$i] = $i;
    $_SESSION['image'.$i]= $i.".png";

}
var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
<!--Génération du tableau-->
<?php
for ($x=0; $x <= 4; $x++) {
    echo "<tr>";

    for ($y=0; $y <= 3;$y++){
        echo '<td>ligne '.$x.' , colonne '.$y.'</td>';

    }
    echo "</tr>";
}
 ?>
</table>

</body>
</html>
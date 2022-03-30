
<html>
<head>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "","","");
$mysqli->set_charset("utf8");

$ligne = htmlspecialchars($_POST['ligne'], ENT_QUOTES, ENT_COMPAT);
$balise = htmlspecialchars($_POST['balise'], ENT_QUOTES, ENT_COMPAT);
$lien = htmlspecialchars($_POST['check'], ENT_QUOTES, ENT_COMPAT);
$requete = "INSERT INTO entre(ligne, lien, balise) VALUES('" . $ligne . "', '" . $lien . "' , '" . $balise . "')";
echo $requete;
$resultat = $mysqli->query($requete);

if ($resultat){
        echo "<p>La ligne a été ajoutée</p>";
        header('Location: .\index.php');
}
else
        echo "<p>Erreur</p>";

$mysqli->close();
?>

</body>
</html>









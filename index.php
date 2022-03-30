<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Ilaréson</title>
</head>
<body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!------------------------------------------------------- RULES -------------------------------------------------->

<h4> Welcome, juste quelques règles :
Tu spam pas la con de toi, le charabia de 3 km en H1 t oublie. Le site est public, ya une limite a lhumour douteux, jme reserve le droit de delete si jveux</h4>
<h4> + Gros merci a Swinowz qui envoi tellement de php que le cours a plus baissé que le rouble russe</h4>



<!-------------------------------------------------------- TEXTE -------------------------------------------------->
  <form action="ligne.php" method="post"><!-- formulaire texte -->

      Ligne: <input type="text" name="ligne" /><!-- texte  ligne-->

      <label for="balise">Choix balise:</label><!-- selection balise -->
      <select name="balise" required=true>
        <option value="vide" selected>aucune</option>
        <option value="h1">h1</option><!-- balise par défaut -->
        <option value="h2">h2</option>
        <option value="h3">h3</option>
        <option value="h4">h4</option>
      </select>

      <label for="check">Lien :</label> <!-- input = lien ? -->
      <input type="checkbox" name="check" value='Oui'><!-- case à cocher -->

      <input type="submit" /> <!-- envoyer -->

  </form></br><!-- fin formulaire-->

<!-------------------------------------------------------- FIN TEXTE -------------------------------------------------->


<!-------------------------------------------------------- Image -------------------------------------------------->
  <form enctype="multipart/form-data" method="post" name="changer"><!-- formulaire -->
     Image : <input type="file" name="image" accept="image/png, image/gif, image/jpg, image/jpeg"> <!-- importer -->
      <input value="Envoyer" type="submit" name='ok_save'> <!-- envoyer -->
  </form><!-- fin formulaire -->
  <?php   if(isset($_POST['ok_save'])) {
        $mysqli = mysqli_connect("localhost","","","");

        if ($_FILES["image"]["error"] > 0)
            echo "<font size = '5'>Erreur,pas de fichier choisi";

        else
        {
          $file="img/".$_FILES["image"]["name"]; /* chemin */
          move_uploaded_file($_FILES["image"]["tmp_name"], $file); /* enregistrement temporaire */

          $nombre = count(glob("img/*")); /* nombre de fichiers dans le dossier img/ */
          $ext = pathinfo($file,PATHINFO_EXTENSION);/* recup extension */
          $nom = 'img/' . ($nombre++) . ".$ext";

           rename($file, $nom); /* renomme l'ancien fichier avec le nouveau nom */



          $sql="INSERT INTO entre(chemin) VALUES ('$nom')"; /* requête sql */
          if (!mysqli_query($mysqli, $sql)) /* envoi requête */
            die('Erreur: ' . $mysqli -> error);

          }
        $mysqli->close();
      }?>


<!-------------------------------------------------------- FIN IMAGE -------------------------------------------------->

<br><br><br>
<!-------------------------------------------------------- AFFICHAGE -------------------------------------------------->
<div id='refresh'></div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function loadlink(){
    $('#refresh').load('texte.php',function () {
         $(this).unwrap();
    });
}

loadlink(); // execution dès le lancement de la page
setInterval(function(){
    loadlink() /* fonction qui tourne toutes les secondes */
}, 1000);
</script>
<!-------------------------------------------------------- FIN AFFICHAGE -------------------------------------------------->
</body>
</html>

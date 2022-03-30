<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Ilaréson</title>
</head>
<body>
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
  <form enctype="multipart/form-data" action="img.php" method="post" name="changer"><!-- formulaire -->
     Image : <input type="file" name="image" accept="image/png, image/gif, image/jpg, image/jpeg"> <!-- importer -->
      <input value="Envoyer" type="submit" name='ok_save'> <!-- envoyer -->
  </form><!-- fin formulaire -->
  <?php if(isset($_POST['ok_save'])) 
        include('img.php');//insertion chemin dans bdd?>
<!-------------------------------------------------------- FIN IMAGE -------------------------------------------------->

<br><br><br>
<!-------------------------------------------------------- AFFICHAGE -------------------------------------------------->
    <?php
        $mysqli = mysqli_connect("localhost","","","");
        $resultat1 = $mysqli->query("SELECT id,ligne,balise,lien,chemin FROM entre ORDER BY id DESC;");
        while ($row = $resultat1->fetch_assoc() ) {// récupère ligne
$id = $row['id'] . '- ';
            if (empty($row['ligne'])){// si le texte est vide (donc ligne vide ou uniquement chemin rempli)
                if(empty($row['chemin'])){//vérif si chemin est vide
                  continue; // si ligne+chemin vide, on passe à la boucle suivante
                }
                else{//si ligne vide mais chemin rempli
                  $img = $row['chemin'];// récupere chemin depuis la bdd
                  echo "$id<img src=$img style='max-width : 80vh; max-height : 80vh;'> <br>"; //affiche l'image
                }
            }
            else{// si la ligne est remplie
              $b = $row['balise'];
              $lien= $row['lien'];
              $ligne= $row['ligne'];
              if($b == "vide" && empty($lien)){/* si pas de balise et pas de lien */
                echo  $id . $row['ligne'] . '<br>' ; 
              }
              elseif($b == "vide" && $lien == "Oui"){/* si pas de balise mais un lien */
                echo "<a href=$ligne>$ligne</a><br>";
              }
              elseif($b != "vide" && empty($lien)){/* Si une balise et pas de lien */
                echo "<$b>$ligne</$b>";
              }
              elseif($b != "vide" && $lien == "Oui"){/* Si une balise et un lien */
                echo "<a href=$ligne><$b>$ligne</$b></a>";
              }
          }
        }


 ?>
<!-------------------------------------------------------- FIN AFFICHAGE -------------------------------------------------->
</body>
</html>





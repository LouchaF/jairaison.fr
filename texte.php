<?php
        $mysqli = mysqli_connect("localhost","","","");//connection bdd
        $resultat1 = $mysqli->query("SELECT id,ligne,balise,lien,chemin FROM entre order by id desc");
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
                echo '<a href=' . $ligne . '>' . $id . $ligne . '</a><br>';
              }
              elseif($b != "vide" && empty($lien)){/* Si une balise et pas de lien */
                echo '<' . $b . '>' . $id . $ligne . '</' . $b .'><br>';
              }
              elseif($b != "vide" && $lien == "Oui"){/* Si une balise et un lien */
                echo '<a href=' . $ligne . '><' .$b . '>' . $id . $ligne . '</' . $b . '></a>';
              }
          }
        }


 ?>

<?php


  $mysqli = mysqli_connect("localhost","","","");

  if ($_FILES["image"]["error"] > 0)
  {
     echo "<font size = '5'>Erreur,pas de fichier choisi <br />";
     echo"<p><font size = '5'>erreur insertion";
   }
   else
   {
echo $_FILES;  
   move_uploaded_file($_FILES["image"]["tmp_name"],"img/" . $_FILES["image"]["name"]);
     echo"<font size = '5'>Image ajoutée<br>";

     $file="img/".$_FILES["image"]["name"];
     $sql="INSERT INTO entre(chemin) VALUES ('" . $file . "');";

//echo $sql;
     if (!mysqli_query($mysqli, $sql))
     {
        die('Erreur: ' . $mysqli -> error);
     }

   }

   $mysqli->close();
// header('Location: .\index.php');
?>

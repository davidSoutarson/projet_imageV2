<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>renomer_un_fichier</title>
  </head>
  <body>

    <form class="telechager" action="" method="post" enctype="multipart/form-data">

      <p>ajouter des images</p>

      <p> <input type="file" name="telechager[]" multiple= "multiple"> </p>

      </p> <input id="telechagerSubmit" name="telechagerSubmit" type="submit"> </p>

    </form>

  </body>
</html>




<?php

  echo "<h2> afichage_contenu form </h2>";

  if (( isset( $_POST["telechagerSubmit"] )AND isset( $_FILES["telechager"] )))
      {
        var_dump($_FILES);
          echo "<p> les fichier on eter soumie a verification </p>";

        foreach ($_FILES["telechager"]["error"] as $key => $error)
        {

          $error = $_FILES['telechager']['error'][$key];
          $type = $_FILES['telechager']['type'][$key];
          $size = $_FILES['telechager']['size'][$key];

          if ($error !== 0)
            {
              echo "<p>Il y eu une erreur l'or du chargement </p>";
            }

            if ($type !== "image/jpeg" )
            {
              echo "<p> Le type de fichier n'est pas otoriser </p>";
            }
              if ($size >= 50000)
              {
                echo "Le fichier et trop volumineux ";
              }
              else
              {
                echo "<p> Les fichier on été charger </p>";
                if ($type === "image/jpeg")
                {
                  echo "<p> Les ficher sont bien au format :".$type."</p>";
                }
              }
          }

        }

  echo "<p> --------------------- # text fonction # str_replace ----------------------- </p>";

  $filesteste = "teste str_replace':àéèêôûîÊÂÔÎÛ nétôyer";

  $special = array(' ','\'','á','à','â','ä','ã','ç','é','è','ê','ë',
                   'í','ì','î','ï','ñ','ó','ò','ô','ö','õ',
                   'ú','ù','û','ü','ý','ÿ','Á','À','Â','Ã','Ç',
                   'É','È','Ê','Ë','Í','Ì','Î','Ï','Ñ','Ó','Ò',
                   'Ô','Ö','Õ','Ú','Ù','Û','Ü','Ý');

   $normal = array('_','','a','a','a','a','a','c','e','e','e','e',
                   'i','i','i','i','n','o','o','o','o','o',
                   'u','u','u','u','y','y','A','A','A','A','C',
                   'E','E','E','E','I','I','I','I','N','O','O',
                   'O','O','O','U','U','U','U','Y');

   //$result = str_replace($special,$normal,"c'áàâäã'çéèêëíìîïñóòôöõúùûüýÿÁÀÂÃÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝ");

     $result = str_replace($special,$normal,$filesteste);

     echo "<p>".$result."</p>";






 ?>

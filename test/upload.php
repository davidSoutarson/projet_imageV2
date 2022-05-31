<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>teste upload</title>
  </head>
  <body>

    <form id="uploadForm" action="" method="post" enctype= "multipart/form-data">
      <p>Ajoutez des images</p>
      <input type="file" name="upload[]" multiple="multiple">
      <input id="uploadFormSubmit" name="uploadFormSubmit" type="submit">
    </form>

  </body>
</html>

<?php
// var_dump($_FILES);
// echo "<br>------------------------------Le nom original du fichier-----------------------------------<br>";
// var_dump($_FILES['upload']['name']);
// echo "<br>------------------------------Le type du fichier-----------------------------------<br>";
// var_dump($_FILES['upload']['type']);
// echo "<br>------------------------------La taille du fichier-----------------------------------<br>";
// var_dump($_FILES['upload']['size']);
// echo "<br>------------------------------Le nom temporaire du fichier qui sera chargé sur la machine serveur-------<br>";
// var_dump($_FILES['upload']['tmp_name']);
// echo "<br>------------------------------Le code d'erreur associé au téléchargement de fichier--------------<br>";
// var_dump($_FILES['upload']['error']);
// // echo "<br>------------------------------Le chemin entier tel que soumit par le navigateur.--------------<br>";
// // var_dump($_FILES['upload']['full_path']);
echo "<br>-------------Exemple #3 Envoi d'un tableau de fichiers------------------------------<br>";
  // $file_tmp_mame = $_FILES['upload']['tmp_name'];
  //
  // foreach ($file_tmp_mame as $key => $value) {
  //     echo $key.'?'.$value ;
  // }


foreach ($_FILES["upload"]["error"] as $key => $error) {
  $type = $_FILES['upload']['type'][$key];
  $size = $_FILES['upload']['size'][$key];

  if(($type == 'image/jpeg')AND($size < '40000')) // seules les fichiers jpg sont autorisés

    {
      if ($error == UPLOAD_ERR_OK)
      {
        if(is_uploaded_file( $_FILES['upload']['tmp_name'] [$key]))
        {

          echo "<p>File ". $_FILES['upload']['name'][$key] ." téléchargé avec succès.</p>";

            $tmp_name = $_FILES["upload"]["tmp_name"][$key];
            // basename() peut empêcher les attaques "filesystem traversal";
            // une autre validation/nettoyage du nom de fichier peux être appropriée
            $name = basename($_FILES["upload"]["name"][$key]);
            /*la fonction move_uploaded_file déplace un fichier téléchargé
            (le nom de la fonction est explicite)*/
            move_uploaded_file($tmp_name, "uploads/$name");

        }
      }
    }
    else
    {
      $error++;
      $ficher_rejeter = $_FILES['upload']['name'][$key];

      if($type !== 'image/jpeg')
      {
      echo"<p> le fichier: .$ficher_rejeter . de type : .$type. : n'est pas au format jpg</p> ";
      }
      if($size > '40000')
      {
        echo"<p> le fichier: .$ficher_rejeter. trop volumineux: .$size . de size :</p> ";
      }
    }
}

 ?>

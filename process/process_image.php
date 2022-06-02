<?php
//require('config.php');
require('../class/Image.php');

var_dump($_POST);

if (!isset($_POST['formImageSubmit']))
{
  $error_msg = 'Aucune donnée n\'est fournie.
  <a href= "'. WEB_DIR_URL .'admin/admin.php" > retour  </a>'; // FC j' ai une warnig
}

 if (isset($_POST['formImageSubmit'])) // FC dans le ca ou les valeur son poster

{
  if( (empty($_POST['title']))
  OR (empty($_POST['descr']))
  OR (empty($_POST['filename'])) ) //FC ci les variale son vide
  {
    $error_msg = 'une des informations est manquante.
    <a href="'. WEB_DIR_URL .'admin.php"> retour </a>';// j' ai une warnig

  }
  else
  {
    //enregistrement dans la base de donner
    //Chapitre 2 Définition du besoin et scénario d'usage du gestionnaire d'images
    // 2. process_image.php – étape 2
    //enregitement dans la base fig 24 page 15
    $title = trim ( $_POST ['title']);//FC
    $descr = trim ($_POST ['descr']);//FC
    $filename = trim ($_POST ['filename']);//FC

    $image = new Image(); // apeler lobjet est metode
    $insertImage = $image->insertImage($title, $descr, $filename) ;



    if(isset($_POST['update'] ))
    {
      $insertimage = $image-> updateImageData ($title, $descr , $filename);
    }
    else
    {
      $insertImage = $image-> insertImage ($title, $descr, $filename);
    }

    if (true === $insertImage) // si le retour de la méthode est true
    {
      $msg_success = 'Les information ont bien été enregistrées dans la base de donnée .';

    }
    else
    {
      $error_msg = $insertImage;

    }
  }
}

if (isset($error_msg))
{
  echo $error_msg;
}
/*
Optimisation fonctionnelle du gestionnaire
  C. Modification du fichier process_image.php
  fig 20 page 13
  atention a éfetuer :
  D. Intervention sur la table : index unique pour
  le champ filename
  fig 21 page 14 Optimisation fonctionnelle du gestionnaire
  ou
  fig 22 23 comende a taper en sql

*/



?>

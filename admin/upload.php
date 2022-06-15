<?php
require('../config.php');
require('../class/Image.php');
require('top.php');
require('menu.php');
//require('../process/process_image.php');//???

if (!empty($_FILES))
{
  $image = new Image();
  $images = $image->upload($_FILES);
  if ($images === true)
  {
    $msg_succes = "Le chargement a reusie";
  }
  else
  {
    $msg_error = "Le chargement a échoué ";
  }
}

 ?>

<article class = "afichage_contenu" id= "upload">

<h1>Upload</h1>

<?php if(isset($msg_succes)):?>
<p class = "msg_success" ><?php echo $msg_succes ?> </p>
<?php endif ?>
<?php if(isset($msg_error)):?>
<p class = "msg_error" ><?php echo $msg_error ?> </p>
<?php endif ?>

<form id="uploadForm" action="" method="post" enctype= "multipart/form-data">
  <p>Ajoutez des images</p>
  <input type="file" value="" name="upload[]" multiple="multiple">
  <input id= "uploadFormSubmit" name="uploadFormSubmit" type="submit">
</form>

</article>
<?php
$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);

 ?>

<article class = "afichage_contenu">

  <h1> admin upload </h1>
   <ul>
    <?php foreach ($images as $image) : ?>
    <li>

      <img src=" <?php echo THUMB_DIR_URL. $image ['filename'] ?>" /> <!--miniature créer-->
    <!-- cette modification daficher les modification  faite par un administrateur
    la POO rend posible cette modife
    Finalisation : ajout des informations sur la page  de contenu front
    page 11 fig 14
     -->
      <p><?php echo $image['title'] ?> </p>
      <p> <?php echo $image['description'] ?></p>
    </li>

   <?php endforeach ?>
   </ul>

</article>

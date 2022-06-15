<?php
require('top.php');
require('menu.php');
$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);

$constant = get_defined_constants(true);
var_dump($constant['user']);
 ?>

 <article class = "afichage_contenu">

   <h1> <?php echo WEB_TITLE ?> index du SITE </h1>
    <ul>
     <?php foreach ($images as $image) : ?>
     <li>
       <img src=" <?php echo IMAGE_DIR_URL. $image ['filename'] ?>" />
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


  </body>
  </html>

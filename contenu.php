<?php
require('top.php');
require('menu.php');
$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);


 ?>


   <h1> <?php echo WEB_TITLE ?> index du SITE </h1>

     <?php foreach ($images as $image) : ?>
     <li>
       <img src=" <?php echo IMAGE_DIR_URL. $image ['filename'] ?>" />
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

  </body>
  </html>

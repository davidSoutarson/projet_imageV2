<?php
require('../config.php');
require('../class/Image.php');
require('top.php');
require('menu.php');
//require('../process/process_image.php');//fig 16 chaitre 3


$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);
?>
<h1>  Admin </h1>

<p> vous pouver modifier les Titre et et les Description </p>

<ul>
  <?php foreach ($images as $image) : ?>
    <li><img src=" <?php echo IMAGE_DIR_URL. $image['filename'] // ['filename']modier chap 3?>" />

      <form method="post" action="../process/process_image.php">

        <p> Titre : <input type="text" name="title"  value=" <?php
        echo $image['title'] ?> " /> </p>

        <input type="hidden" name="filename" value ="<?php echo $image['filename'] ?>" />

        <p> Description  <br> <textarea name="descr" cols="50" rows="5"> <?php
        echo $image['description'] ?> </textarea> </p>

        <?php  if(!empty($image['title'])) : ?>
          <input type="hidden" name= "update" Value="1" />
        <?php endif ?>

        <p> <input type="submit" name="formImageSubmit" value="Validez"/> </p>
      </form>

    </li>

  <?php endforeach ?>
</ul>


<!-- <?php
// echo "test cours fig 17 page 11 chapitre 2 <br>
// ecri le tablau constante utiliser <br>
// se test sera suprimer par la suis ";
//
// $contants = get_defined_constants(true);
// var_dump($contants['user']);

?> -->

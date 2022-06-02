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


</body>
</html>

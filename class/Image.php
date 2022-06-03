<?php
class Image
/*
// La classe Image permettra donc d’effectuer deux opérations :
// afficher les images contenus dans le répertoire avec la méthode : getImages($image_dir) ;
// enregistrer dans la base les informations postées depuis l’administration : insertImage($title, $descr, $filename).
*/

{

  public function __construct()
  {
    // Le constucteur et vide pour le projet
  }
  /*metode retoutnant les ficher présent dans le ou
  nous avons placé nos images et que nous définissons  au moyent de la
  variable  $image_dir
  fig 12 chapitre 2 avant modification
  */
  public function getImages($image_dir) //
  {
    //iterator
    $i = 0;
    //nous ouvons le docier  $image_dir opendir
    //et afecton le resulta a la varible $handle
    if ($handle = opendir($image_dir))
    {

      while (false !== ($entry = readdir( $handle )))
      {
        /*la variable $entry ne pour pas ce voir afecter les . ou les ..*/
        if( $entry != "." && $entry != "..")
        {
          $i++;
          $images[$i] ['filename'] = $entry;
          // utilisation de this pour apeler la methode getImageData
          $image_data = $this->getImageData($entry);

          $images [$i] ['title'] = $image_data['title'] ; // ?
          $images [$i] ['description'] = $image_data['description'] ; // ?

        }
      }
    }
    closedir ($handle);//nous fermons le repertoire avec closedir
    return $images; //nous retournons le tableau de données
  }
  /*-----------------------------------------------------------*/

  /* la method insertImage  per enregistrer dans la base les informations
  postées depuis l’administration : insertImage($title, $descr, $filename).*/

  public function insertImage ($title, $descr, $filename)
  {
    $mysqli = new mysqli('localhost','root','','projet_image');
    $mysqli->set_charset("utf8");
    // verification de connexion à la base
    if ($mysqli->connect_errno) {
      echo 'echec de la connexion ' .$mysqli->connect_errno ;
      exit();
    }
    // insertion fomuler admin.php dans la BD
    if (!$mysqli->query('INSERT INTO image (title,description,filename) VALUES ("'. $title .'", "'. $descr .'", "'. $filename .'")'))
    {
      //fi 19 chapitre 3
      $msg_error = 'Une erreur est survenue lors de l\'insertion des données dans
      la base .Le mesage, Mesage d\'erreur :' . $mysqli->error;

      return $msg_error;
    }

    else {
      return true;

      $mysqli->close();
    }

  }

  // 03 Optimisation fonctionnelle du gestionnaire : pages 5
  // méthode qui nous permet de retourner le tableau  $image_data
  // contenant donc les informations de la table image :

  public function getImageData ($filename)
  {
    $mysqli = new mysqli('localhost','root','','projet_image');

    $mysqli->set_charset("utf8");
    /* verification de conexion à la base */

    if ($mysqli->connect_errno) {
      printf("Echec de la conection %s\n",$mysqli->connect_error);
      exit();
    }

    $result =$mysqli->query('SELECT id, title, description, filename
      FROM image WHERE filename = "' . $filename . '" ');

      if (!$result)
      {
        echo 'Une erreur est sur venue lor de la recuperation des données dans
        la base. Mesage d\'erreur : ' . $mysqli->error;
        return false;
      }
      else {
        $row = $result->fetch_array();
        if (is_null($row)
        {
          $row = [
            'id' => null,
            'title' => null,
            'description' => null,
            'filename' => null
          ]
        }
        $image_data['id'] = $row['id'];
        $image_data['title'] = $row['title'];
        $image_data['description'] = $row['description'];
        $image_data['filename'] = $row['filename'];
        return $image_data;
      }
      $mysqli->close ();
    }

    //Le code de la méthode updateImageData page 10 fig 11

    public function updateImageData ($title, $descr , $filename)
    {
      $mysqli = new mysqli('localhost','root','','projet_image');

      /* verification de conexion à la base */
      if ($mysqli->connect_errno) {
        echo'Echec de la conection '. $mysqli->connect_error;
        exit();
      }
      if (!$mysqli-> query('UPDATE image SET title = "' . $title . '",
      description = "' . $descr . '" WHERE filename = "'. $filename .'" '))
      {
        //fig 18 chapitre 3

        $msg_error = ' Une ereur est survenue lors de la mise a jour des données
        dans la base.<br/> Le message d\'erreur de Mysqult est : ' .$mysqli->error;
        $msg_error = '<br/> Aucune infomaation n\'a été enregistrée.';

        return $msg_error ;

      }
      else
      return true;

      $mysqli->close ();

    }

    public function upload ($files)
    {
      $upload_dir = IMAGE_DIR_PATH;
      foreach ($files['upload'] ['error'] as $key => $error)
      {
        $error = 0;
        //A. Empêcher le chargement de certains types de fichiers
        $type = $files['upload']['type'] [$key];
        if($type == 'image/jpeg')//seules les fichier jpg sont autorisés
        {
          if ($error == UPLOAD_ERR_OK)
          {
            $tmp_name = $files ['upload']['tmp_name'][$key];
            $name = $files ['upload']['name'][$key];
            if(move_uploaded_file($tmp_name, $upload_dir . $name) == false)
            {
              $error++ ;
            }

          }
          else
          {
            $error++;
          }
        }
        else
        {
          $error++;
        }
      }
      if($error== 0)
      {
        return true;
      }
      else
      {
        return false;
      }




    }

/*------------------------------------------------------------------------------*/
    public function creatThumbnail ($filename)
    {
      //1. définition des chemins des images et des vignettes
      $image = IMAGE_DIR_PAHT . $filename;
      $vignette = THUMB_DIR_PHAT . $filename;

      //2.récuperation des dimention de l'image source
      $size = getimagesize($image) ;
      $largeur = $size[0];
      $hauteur = $size[1];

      //3. définition des valeurs souhaitées pour les vignettes
      //ce sont des valeurs maximales
      $largeur_max = 200;
      $hauteur_max = 200;

      //4. création de l'image source avec imagecreatefromjpeg
      $image_scr = imagecreatefromjpeg($image);

      //3. On crée un ratio (une proportion)
      // et on verifie que l'image source ne soit pas
      //plus petite que l'image de destination

      if ($largeur >$largeur_max OR $hauteur > $hauteur_max)
      {
        if ($hauteur <= $largeur ) //si la largeur plus grande que la hauteur
        {
          $ratio = $largeur_max / $largeur;
        }
        else
        {
          $ratio = $hauteur_max / $hauteur;
        }
      }
      else
      {
        $ratio = 1; //l'image créer sera identique a loriginale
      }

      //4. création de limage noire de déstination avec dimention souhaitées
      $image_destination = imagecreatetruecolor(round($largeur * $ratio),
      round($hauter * $ratio));
      //5. fabrication de la vignette avec dimention souhaitées
      imacopyresampled($image_destination, $image_src, 0,0,0,0,
      round($largeur * $ratio), round($hauter * $ratio), $largeur, $hauteur);

      //6. Envoi de la nouvelle image JPEG dans le fichier
      if (!imagejpeg($image_destination, $vignette))
      {
        $error_msg = 'la creation de la vignette a echouée pour l\'image'.
        $image;
        return $error_msg;
      }
      else
      {
        return false;
      }

    } // fin de la méthode createThumbnail :

  }
  ?>

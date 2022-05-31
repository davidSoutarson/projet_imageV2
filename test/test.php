<?php
//Teste donc la fonction opendir

$handle = opendir('E:/wamp64/www/projet_image');//chemin complait du docier

var_dump($handle);// $handle est le nom traditionnel donné aux variables contenant des informations de Répertoires.

//Teste donc la fonction readdir

$entry = readdir($handle);//entry Une entrée est un fichier au sens où l’entend UNIX,
var_dump($entry);
$entry = readdir($handle);//*2
var_dump($entry);
$entry = readdir($handle);//*3
var_dump($entry);
$entry = readdir($handle);//*4
var_dump($entry);
$entry = readdir($handle);//*5
var_dump($entry);

// Une utilisation de la fonction readdir avec une boucle while semble alors
// être une idée judicieuse pour afficher dynamiquement l’ensemble des
// fichiers contenus, en excluant les points et double points. C’est d’ailleurs
//la méthode préconisée par le manuel PHP dont nous allons étudier
// l’exemple #1 pour l’adapter et l’intégrer dans une méthode de notre
// classe Image.


while (false !== ($entry = readdir($handle))) {
  var_dump($entry);
}
// La boucle while signifie ici : tant qu’il est possible de lire les fichiers du
// répertoire avec readdir et d’affecter ce résultat à une variable $entry.

// « tant que ce n’est pas faux » ce qui justifie la syntaxe
// « false !== » qui signifie que la proposition ($entry = readdir($handle))
// n’est pas fausse, et que donc la boucle peut continuer.

echo "------------------------------------------------------------------------";
$handle_image = opendir('E:/wamp64/www/projet_image/images');//chemin complait du docier

var_dump($handle_image);// $handle est le nom traditionnel donné aux variables contenant des informations de Répertoires.

while (false !== ($entry_image = readdir($handle_image))) {
  //var_dump($entry_image);
  if( $entry_image != "." && $entry_image != "..")
  {
  echo "<p> <img src='../image/$entry_image'  alt= 'bien bien ou son les images'> </p>";
  }
}
?>

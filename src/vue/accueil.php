<?php
    /** @var \PDOStatement|false $requeteFilms */
    assert(isset($requeteFilms), 'La variable $requeteFilms doit être définie.');
    assert($requeteFilms instanceof \PDOStatement || $requeteFilms === false, 'La variable $requeteFilms doit être une instance de PDOStatement ou false.');
?>

<?php
// Définition du titre de l'onglet.
// En PHP, lorsqu'on déclare une variable, celle-ci est accessible dans tout le script.
// Cela signifie qu'on peut utiliser $titreOnglet dans la vue gabarit.php qui est incluse plus bas.
$titreOnglet = 'Accueil';
?>

<?php
// Démarrage de la mise en tampon de sortie.
// Cela permet de capturer le contenu HTML généré (echo, <h1>, <p>, etc.).
// On récupère ensuite ce contenu dans la variable $contenu avec ob_get_clean().
ob_start();
?>

<h1 class="text-center">Accueil</h1>
<h4>Liste de films</h4>
<?php 
    while ($film = $requeteFilms->fetch())
    {
        echo $film['id'] . " - " . $film['titre'] . "<br>";
    }

?>

<?php
// Récupération de tout le contenu généré depuis le début de la mise en tampon.
// Le contenu est ensuite stocké dans la variable $contenu.
// La variable $contenu est ensuite utilisée dans la vue gabarit.php.
// Ici, la valeur de $contenu sera la string : <h1 class="text-center">Accueil</h1>
$contenu = ob_get_clean();
?>

<?php
// Chargement de la vue gabarit.php
// Le gabarit est responsable de l'affichage de la structure HTML de base de l'application
// et utilise la variable $contenu pour afficher le contenu spécifique à chaque page.
require 'vue/gabarit.php';
?>
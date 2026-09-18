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


<?php 

if(!isset($_SESSION['compteur'])) 
    {
        $compteur = 1;
    }


if ($_SESSION['compteur'] >= 42) 
    {
        session_unset();
        session_destroy();
    }

echo ($_SESSION['compteur']);
$_SESSION['compteur']++;
?>

<?php


$contenu = ob_get_clean();
?>

<?php
// Chargement de la vue gabarit.php
// Le gabarit est responsable de l'affichage de la structure HTML de base de l'application
// et utilise la variable $contenu pour afficher le contenu spécifique à chaque page.
require 'vue/gabarit.php';
?>
<?php
// Le contrôleur est responsable de la gestion des requêtes et de la logique métier.
// Il interagit avec les modèles (BD) pour récupérer ou modifier des données,
// et prépare les données à afficher dans les vues.

function afficherPageAccueil()
{
    // Ici on se contente d'afficher la page d'accueil
    require 'vue/accueil.php';
}

function afficherFormulaire()
{
    // Ici on se contente d'afficher la page d'accueil
    require 'vue/formulaire.php';
}

function inscrireInfolettre() 
{
    if(!isset($_POST['email']) || filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) || mb_strlen(($_POST['email']) > 5)) {
        header("Location: index.php");
        exit;
    }
    echo htmlspecialchars($_POST['email']);
}
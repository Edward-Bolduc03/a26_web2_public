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

function validerDonneesInscrireAUnCours()
{
    $choixDeCours = ['Développement Web 2', 'Programmation Objet 2'];
    $erreurs = [];
    if (empty($_POST['nom']) || mb_strlen($_POST['nom']) < 3 || mb_strlen($_POST['nom']) > 50) {
        $erreurs[] = 'Le nom est requis et doit contenir entre 3 et 50 caractères.';
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || mb_strlen($_POST['email']) > 255) {
        $erreurs[] = 'L\'email est requis, doit être valide et contenir au maximum 255 caractères.';
    }
    if (empty($_POST['cours']) || !in_array($_POST['cours'], $choixDeCours)) {
        $erreurs[] = 'Le choix du cours est requis et doit être valide.';
    }
    return $erreurs;
}

function inscrireAuCours() {
    $erreurs = validerDonneesInscrireAUnCours();
    if (!empty($erreurs)) {
        // Si les données ne sont pas valides, on redirige vers le formulaire
        header('Location: index.php?action=afficherFormulaire');
        exit;
    }
    require 'vue/formulaire2.php';
}

function validerDonneesInscrireAUnCoursPartie2()
{
    $erreurs = [];
    if (empty($_POST['nomTitulaire']) || mb_strlen($_POST['nomTitulaire']) < 3 || mb_strlen($_POST['nomTitulaire']) > 100) {
        $erreurs[] = 'Le nom du titulaire est requis et doit contenir entre 3 et 100 caractères.';
    }
    // Normalement, on devrait utiliser une expression régulière pour valider le format du numéro de carte, mais pour simplifier, on vérifie juste la longueur ici.
    if (empty($_POST['numeroCarte']) || mb_strlen($_POST['numeroCarte']) != 12) {
        $erreurs[] = 'Le numéro de carte est requis et doit être valide.';
    } 
    if (empty($_POST['moisExpiration']) || !in_array($_POST['moisExpiration'], ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'])) {
        $erreurs[] = 'Le mois d\'expiration est requis et doit être valide.';
    }
    if (empty($_POST['anneeExpiration']) || !in_array($_POST['anneeExpiration'], range(date('Y'), date('Y') + 10))) {
        $erreurs[] = 'L\'année d\'expiration est requise et doit être valide.';
    }
    if (empty($_POST['cvv']) || !filter_var($_POST['cvv'], FILTER_VALIDATE_INT) || strlen($_POST['cvv']) < 3 || strlen($_POST['cvv']) > 4) {
        $erreurs[] = 'Le CVV est requis et doit contenir 3 ou 4 chiffres.';
    }
    return $erreurs;
}

function payerEnLigne() 
{
    // Vérifie que les données du formulaire sont valides
    $erreurs = validerDonneesInscrireAUnCoursPartie2();
    if (!empty($erreurs)) {
        // Si les données ne sont pas valides, on redirige vers le formulaire
        header('Location: index.php?action=afficherPageFormulaire');
        exit;
    }

    require 'vue/confirmation.php';
}

?>
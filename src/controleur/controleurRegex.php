<?php
function afficherPageRegex()
{
    require 'vue/regex.php';
}

function validerDonneesSoumettreFormulaireRegex()
{
    $erreurs = [];
    
    $regexExRegex = '/^[a-zA-Z][0-9][a-zA-Z] ?[0-9][a-zA-Z][0-9]$/';
    $telephoneRegex = '/^\(?\d{3}\)?\s?\d{3}-\d{4}$/';
    $emailRegex = '/^[a-zA-Z0-9\.\-_]{2,}[@][a-zA-Z0-9\.\-]{2,}[\.][a-zA-Z]{2,6}$/';

    if (empty($_POST['exRegex']) || !preg_match($regexExRegex, $_POST['exRegex'])) {
        $erreurs[] = 'Vide ou format invalide (ex: G5Y 6Y1).';
    }
    
    if (empty($_POST['telephone']) || !preg_match($telephoneRegex, $_POST['telephone'])) {
        $erreurs[] = 'Vide ou format invalide (ex: (111) 111-1111).';
    }
    
    if (empty($_POST['email']) || !preg_match($emailRegex, $_POST['email'])) {
        $erreurs[] = 'Vide ou format invalide (ex: email@server.com).';
    }

    return $erreurs;
}

function soumettreFormulaireRegex()
{
    $erreurs = validerDonneesSoumettreFormulaireRegex();
    if (!empty($erreurs)) {
        retournerMessageErreurAJAX($erreurs);
    }

    require 'vue/regexSucces.php';
}

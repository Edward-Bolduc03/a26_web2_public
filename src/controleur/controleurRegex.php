<?php
function afficherPageRegex()
{
    require 'vue/regex.php';
}

function validerDonneesSoumettreFormulaireRegex()
{
    $erreurs = [];
    
    $regexExRegex = '/^[a-zA-Z][0-9][a-zA-Z] ?[0-9][a-zA-Z][0-9]$/';

    if (empty($_POST['exRegex']) || !preg_match($regexExRegex, $_POST['exRegex'])) {
        $erreurs[] = 'Vide ou format invalide (ex: abc123).';
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

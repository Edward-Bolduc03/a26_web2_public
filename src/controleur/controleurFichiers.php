<?php
require_once 'modele/modeleFichiers.php';

function afficherPageTeleversement()
{
    require 'vue/televersement.php';
}

function afficherPageFichiers()
{
    bloquerSiNonConnecte();

    $requeteFichiers = ModeleFichiers::obtenirFichiers($_SESSION['utilisateur']['id']);

    require 'vue/fichiers.php';
}

function validerDonneesTeleverser()
{
    $erreurs = [];

    $fichiersTeleverses = obtenirFichiersTeleverses(); 
    if (empty($fichiersTeleverses)) {
        $erreurs = "Veuillez sélectionner un fichier!";
    }
    else {
        foreach ($fichiersTeleverses as $ficher) {
            $resultat = validerFichierTeleverse($ficher, [
                'tailleMax' => 2 * 1024 * 1024, // 2 mb
                'extensionsAutorisees' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
                'mimeTypesAutorisees' => ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp']
            ]);
            if (!$resultat['estValide']) {
                $erreurs = [...$erreurs, ...$resultat['erreurs']];
            }
        }
    }

    return $erreurs;
}

function televerser()
{
    bloquerSiNonConnecte();

    $erreurs = validerDonneesTeleverser();
    if (!empty($erreurs)) {
        retournerMessageErreurSession($erreurs, 'afficherPageTeleversement');
    }

    $connexion = BD::ObtenirConnexion();
    try {
        $connexion->beginTransaction();

        $fichiersTeleverses = obtenirFichiersTeleverses();
        $fichiersEnregistres = enregistrerFichiers($fichiersTeleverses, "televersements/");

        foreach ($fichiersEnregistres as $fichier) {
            ModeleFichiers::ajouterFichier($_SESSION['utilisateur']['id'], 
            $fichier['nomOriginal'], 
            $fichier['chemin']);
        }

        $connexion->commit();
        header('Location: index.php?action=afficherPageFichiers');
    } catch (Exception $e) {
        if ($connexion->inTransaction()) {
            $connexion->rollBack();
        }
        foreach ($fichiersEnregistres ?? [] as $fichier) {
            if (is_file($fichier['chemin'])) {
                unlink($fichier['chemin']);
            }   
        }
        retournerMessageErreurSession(
            ['Une erreur s\'est produite lors de l\'enregistrement des fichiers. Veuillez réessayer!'], 
            'afficherPageTeleversement'
        );
    }

}

function telecharger()
{
    bloquerSiNonConnecte();

    // Vérifier que l'ID du fichier est fourni dans l'URL et valide
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        http_response_code(400);
        exit;
    }

    $requeteFichiers = ModeleFichiers::obtenirFichier($_GET['id']);
    $fichier = $requeteFichiers->fetch();

    if (!$fichier || 
        $fichier['utilisateurs_id'] !== $_SESSION['utilisateur']['id']) {
        http_response_code(404);
        exit;
    }

    telechargerFichier($fichier['chemin_fichier'], $fichier['nom_original']);
}

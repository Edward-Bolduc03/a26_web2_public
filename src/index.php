<?php
session_start();

require_once 'controleur/controleur.php';

try {
    if (!isset($_GET['action'])) {
        afficherPageAccueil();
        return;
    }

    switch ($_GET['action']) {
        case 'afficherPageAccueil':
            afficherPageAccueil();
            break;
        case 'afficherPageJeuMemoire':
            afficherPageJeuMemoire();
            break;
        case 'afficherPageAsyncVsSync':
            afficherPageAsyncVsSync();
            break;
        case 'afficherPageFormulaire':
            afficherPageFormulaire();
            break;
        default:
            throw new Exception('404 : Action non supportée');
    }
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require 'vue/erreur.php';
} catch (Exception $ex) {
    $msgErreur = $ex->getMessage();
    require 'vue/erreur.php';
}

<?php
// Définition du titre de l'onglet.
// En PHP, lorsqu'on déclare une variable, celle-ci est accessible dans tout le script.
// Cela signifie qu'on peut utiliser $titreOnglet dans la vue gabarit.php qui est incluse plus bas.
$titreOnglet = 'Confirmation';
?>



<?php
// Démarrage de la mise en tampon de sortie.
// Cela permet de capturer le contenu HTML généré (echo, <h1>, <p>, etc.).
// On récupère ensuite ce contenu dans la variable $contenu avec ob_get_clean().
ob_start();
?>

<h1 class="text-center">Confirmation</h1>
<p class="text-center">Merci <b><?php echo htmlspecialchars($_POST['nom']); ?></b>, vous êtes inscrit au cours <br><b><?php echo htmlspecialchars($_POST['cours']) ?></b></p> 
<p class="text-center">Un email de confirmation a été envoyé à l'adresse <b><?php echo htmlspecialchars($_POST['email']); ?></b>.</p>
<p class="text-center">Paiement effectué avec la carte :</p>
<div class="card">
    <div class="card-body">
        <p class="card-text text-center">Numéro de carte : <strong><?php echo htmlspecialchars($_POST['numeroCarte']); ?></strong></p>
        <p class="card-text text-center">Nom du titulaire : <strong><?php echo htmlspecialchars($_POST['nomTitulaire']); ?></strong></p>
        <p class="card-text text-center">Date d'expiration : <strong><?php echo htmlspecialchars($_POST['moisExpiration']); ?>/<?php echo htmlspecialchars($_POST['anneeExpiration']); ?></strong></p>
        <p class="card-text text-center">CVV : <strong><?php echo htmlspecialchars($_POST['cvv']); ?></strong></p>
    </div>
</div>


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

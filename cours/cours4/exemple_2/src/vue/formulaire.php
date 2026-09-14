<?php
// Définition du titre de l'onglet.
// En PHP, lorsqu'on déclare une variable, celle-ci est accessible dans tout le script.
// Cela signifie qu'on peut utiliser $titreOnglet dans la vue gabarit.php qui est incluse plus bas.
$titreOnglet = 'Formulaire';
?>

<?php
// Démarrage de la mise en tampon de sortie.
// Cela permet de capturer le contenu HTML généré (echo, <h1>, <p>, etc.).
// On récupère ensuite ce contenu dans la variable $contenu avec ob_get_clean().
ob_start();
?>

<h1 class="text-center">Formulaire</h1>

<form action="index.php?action=inscrireInfolettre" method="post" class="needs-validation" novalidate>
  <div class="mb-3">
    <label for="email" class="form-label">Adresse courriel</label>
    <input name="email" type="email" class="form-control" id="email" required>
    <div class="invalid-feedback">
      Veuillez entrer une adresse courriel valide.
    </div>
  </div>
  
  <button class="btn btn-primary" type="submit">Envoyer</button>
</form>


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
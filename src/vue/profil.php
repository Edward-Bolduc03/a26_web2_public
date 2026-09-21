<?php $titreOnglet = 'Profil'; ?>

<?php ob_start(); ?>

<h1 class="text-center">Profil</h1>
<h4>Bienvenue : <strong> <?php echo htmlspecialchars($_SESSION['nomUtilisateur']); ?> </strong> </h3>
<h4>Votre mot de passe est : <strong> <?php echo htmlspecialchars($_SESSION['motDePasse']); ?> </strong></h3>

<?php $contenu = ob_get_clean(); ?>

<?php require 'vue/gabarit.php'; ?>
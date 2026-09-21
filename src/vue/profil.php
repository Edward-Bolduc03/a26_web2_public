<?php $titreOnglet = 'Profil'; ?>
<?php ob_start(); ?>

<?php
$nomUtilisateur = htmlspecialchars($_SESSION['nomUtilisateur']);
$email = htmlspecialchars($_SESSION['email'] ?? '');
$image = htmlspecialchars($_SESSION['image'] ?? '');
?>

<h1 class="text-center">Profil</h1>

<div class="col-sm-10 col-md-8 col-lg-6 card mx-auto">
    <div class="card-body text-center">
        <!-- Affichage des données du profil -->
        <img id="image-profil" src="<?php echo $image; ?>" alt="Image de profil" class="rounded-circle mb-3" width="100" height="100">
        <h5 class="card-title">Informations du profil</h5>
        <div id="profil-infos">
            <p class="card-text"><strong>Nom d'utilisateur :</strong> <?php echo $nomUtilisateur; ?></p>
            <p class="card-text"><strong>Email :</strong> <?php echo $email; ?></p>
            <button id="btn-modifier-profil" class="btn btn-primary mt-3" type="button">Modifier le profil</button>
        </div>
        <!-- Formulaire de modification du profil -->
        <form action="index.php?action=modifierProfil" id="form-modifier-profil" style="display:none;" method="post">
            <div class="mb-3 text-start">
                <label for="newUsername" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername" value=<?php echo $nomUtilisateur; ?>>
            </div>
            <div class="mb-3 text-start">
                <label for="newEmail" class="form-label">Email</label>
                <input type="text" class="form-control" id="newEmail" name="newEmail" value=<?php echo $email; ?>>
            </div>
            <div class="mb-3 text-start">
                <label for="image" class="form-label">URL de l'image de profil</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="https://...">
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button type="button" class="btn btn-danger ms-2" id="btn-annuler">Annuler</button>
        </form>
    </div>
</div>

<script src="js/profil.js"></script>

<?php $contenu = ob_get_clean(); ?>
<?php require 'vue/gabarit.php'; ?>
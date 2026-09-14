<?php
// Définition du titre de l'onglet.
// En PHP, lorsqu'on déclare une variable, celle-ci est accessible dans tout le script.
// Cela signifie qu'on peut utiliser $titreOnglet dans la vue gabarit.php qui est incluse plus bas.
$titreOnglet = '2e Formulaire';
?>

<?php
// Démarrage de la mise en tampon de sortie.
// Cela permet de capturer le contenu HTML généré (echo, <h1>, <p>, etc.).
// On récupère ensuite ce contenu dans la variable $contenu avec ob_get_clean().
ob_start();
?>



<h1 class="text-center">Paiement en ligne</h1>

<form
		method="post"
		action="index.php?action=payerEnLigne"
		class="needs-validation"
		novalidate>
    <input name="nom" value="<?= htmlspecialchars($_POST['nom']) ?>" hidden>
    <input name="email" value="<?= htmlspecialchars($_POST['email']) ?>" hidden>
    <input name="cours" value="<?= htmlspecialchars($_POST['cours']) ?>" hidden>
    <div class="mb-3">
        <label for="nomTitulaire" class="form-label">Nom du titulaire:</label>
        <input
            type="text"
            class="form-control"
            id="nomTitulaire"
            placeholder="Entrez le nom sur la carte"
            name="nomTitulaire"
            autocomplete="cc-name"
            required
            minlength="3"
            maxlength="100">
        <div class="invalid-feedback">
            Le nom du titulaire est requis et doit contenir entre 3 et 100 caractères.
        </div>
    </div>

    <div class="mb-3">
        <label for="numeroCarte" class="form-label">Numéro de carte:</label>
        <input
            type="text"
            class="form-control"
            id="numeroCarte"
            placeholder="1234 5678 9012 3456"
            name="numeroCarte"
            inputmode="numeric"
            autocomplete="cc-number"
            required
            minlength="12"
            maxlength="12">
        <div class="invalid-feedback">
            Le numéro de carte est requis et doit être valide.
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 mb-3">
            <label for="moisExpiration" class="form-label">Mois:</label>
            <select
                class="form-select"
                id="moisExpiration"
                name="moisExpiration"
                autocomplete="cc-exp-month"
                required>
                <option value="" selected disabled>Mois</option>
                <option value="01">01 - Janvier</option>
                <option value="02">02 - Février</option>
                <option value="03">03 - Mars</option>
                <option value="04">04 - Avril</option>
                <option value="05">05 - Mai</option>
                <option value="06">06 - Juin</option>
                <option value="07">07 - Juillet</option>
                <option value="08">08 - Août</option>
                <option value="09">09 - Septembre</option>
                <option value="10">10 - Octobre</option>
                <option value="11">11 - Novembre</option>
                <option value="12">12 - Décembre</option>
            </select>
            <div class="invalid-feedback">
                Le mois d'expiration est requis.
            </div>
        </div>

        <div class="col-sm-4 mb-3">
            <label for="anneeExpiration" class="form-label">Année:</label>
            <select
                class="form-select"
                id="anneeExpiration"
                name="anneeExpiration"
                autocomplete="cc-exp-year"
                required>
                <option value="" selected disabled>Année</option>
                <?php
                $anneeCourante = date('Y');
                for ($i = 0; $i < 10; $i++) {
                    $annee = $anneeCourante + $i;
                    echo "<option value=\"{$annee}\">{$annee}</option>";
                }
                ?>
            </select>
            <div class="invalid-feedback">
                L'année d'expiration est requise.
            </div>
        </div>

        <div class="col-sm-4 mb-3">
            <label for="cvv" class="form-label">CVV:</label>
            <input
                type="password"
                class="form-control"
                id="cvv"
                placeholder="123"
                name="cvv"
                inputmode="numeric"
                autocomplete="cc-csc"
                required
                minlength="3"
                maxlength="4">
            <div class="invalid-feedback">
                Le CVV est requis et doit contenir 3 ou 4 chiffres.
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary d-block mx-auto">
        Terminer l'inscription
    </button>

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
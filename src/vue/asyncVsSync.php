<?php $titreOnglet = 'Async VS Sync'; ?>
<?php ob_start(); ?>


<div class="row text-center m-3 col-10 col-sm-8 col-md-6 col-lg-4 mx-auto">
    <label for="nombreSecondes" class="form-label text-center">Nombre de secondes</label>
    <input type="number" id="nombreSecondes" class="form-control text-center" value="3" min="1">
</div>
<div class="row text-center">
    <div class="col">
        <button type="button" class="btn btn-secondary" id="btn-sync">Synchrone</button>
        <div id="affichage-sync"></div>
    </div>
    <div class="col">
        <button type="button" class="btn btn-secondary" id="btn-async">Asynchrone</button>
        <div id="affichage-async"></div>
    </div>
</div>

<script src="js/asyncVsSync.js"></script>

<?php $contenu = ob_get_clean(); ?>
<?php require 'vue/gabarit.php'; ?>
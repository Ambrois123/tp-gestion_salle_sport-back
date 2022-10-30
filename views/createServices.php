<?php ob_start(); ?>

<for method="POST" action="<?= URL ?>admin/branche/validateCreate" class="container pb-3">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="gestion_membres" name="gestion_membres">
  <label class="form-check-label" for="gestion_membres">
    Gestion des membres
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="gestion_abonnement" name="gestion_abonnement">
  <label class="form-check-label" for="gestion_abonnement">
    Gestion des abonnements
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="gestion_collabo" name="gestion_collabo">
  <label class="form-check-label" for="gestion_collabo">
    Gestion des collaborateurs
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="gestion_compta" name="gestion_compta">
  <label class="form-check-label" for="gestion_compta">
    Gestion de la comptabilité
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="gestion_prelevement" name="gestion_prelevement">
  <label class="form-check-label" for="gestion_prelevement">
    Gestion des prélèvements
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="relance_imp" name="relance_imp">
  <label class="form-check-label" for="relance_imp">
    Relance des impayés
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="acces_tourniquet" name="acces_tourniquet">
  <label class="form-check-label" for="acces_tourniquet">
    Accès par tourniquet
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="acces_badge" name="acces_badge">
  <label class="form-check-label" for="acces_badge">
    Accès par badge
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="acces_qrcode" name="acces_qrcode">
  <label class="form-check-label" for="acces_qrcode">
    Accès par QRCode
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="video_surv" name="video_surv">
  <label class="form-check-label" for="video_surv">
    Vidéo Surveillance
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="vente_boisson" name="vente_boisson">
  <label class="form-check-label" for="vente_boisson">
    Vente boisson
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="org_evenement" name="org_evenement">
  <label class="form-check-label" for="org_evenement">
    Organisation évènement
  </label>
</div>
  <div class="mb-3">
        <label for="salle_image" class="form-label">Clients:</label>
        <select class="form-select" aria-label="Default select example" name="table_salle">
        <option selected>Selectionnez le client</option>
        <?php foreach ($clients as $client) : ?>
            <option value="<?= $client['client_id'] ?>">
            <?= $client['client_id'] ?> - <?= $client['client_name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>
<div class="mb-3">
        <label for="salle_image" class="form-label">Contrats:</label>
        <select class="form-select" aria-label="Default select example" name="table_salle">
        <option selected>Selectionnez un contrat</option>
        <?php foreach ($contrats as $contrat) : ?>
            <option value="<?= $contrat['contrat_id'] ?>">
            <?= $contrat['contrat_id'] ?> - <?= $contrat['contrat_name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>

  <button type="submit" class="btn btn-primary">Valider</button>
</for m>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Page de création d'un service";
//call the template create in views.
require "./views/template.php";

?>
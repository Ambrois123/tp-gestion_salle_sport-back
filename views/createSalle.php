<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/salles/validateCreate" class="container pb-3" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="salle_name" class="form-label">Nom de la salle</label>
    <input type="text" class="form-control" id="salle_name" name="salle_name">
  </div>
  <div class="mb-3">
    <label for="salle_address" class="form-label">Adresse de la salle</label>
    <input type="salle_address" class="form-control" id="salle_address" name="salle_address">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="salle_active" name="salle_active">
    <label class="form-check-label" for="exampleCheck1">Salles active</label>
  </div>
  <div class="mb-3">
        <label for="salle_image" class="form-label">Image :</label>
        <input class="form-control" type="file" id="salle_image" name="salle_image">
 </div>
 <div class="mb-3">
        <label for="clientId" class="form-label">Clients:</label>
        <select class="form-select"  name="clientId">
        <option selected>Selectionnez un client</option>
        <?php foreach ($clients as $client) : ?>
            <option value="<?= $client['client_id'] ?>">
            <?= $client['client_id'] ?> - <?= $client['client_name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>
<div class="mb-3">
        <label for="branchId" class="form-label">Branches:</label>
        <select class="form-select"  name="branchId">
        <option selected>Selectionnez la branche</option>
        <?php foreach ($branches as $branch) : ?>
            <option value="<?= $branch['branch_id'] ?>">
            <?= $branch['branch_id'] ?> - <?= $branch['branch_name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>
<div class="mb-3">
        <label for="contratId" class="form-label">Contrats:</label>
        <select class="form-select"  name="contratId">
        <option selected>Selectionnez le contrat</option>
        <?php foreach ($contrats as $contrat) : ?>
            <option value="<?= $contrat['contrat_id'] ?>">
            <?= $contrat['contrat_id'] ?> - <?= $contrat['contrat_name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>
<div class="mb-3">
        <label for="zoneId" class="form-label">Zones:</label>
        <select class="form-select"  name="zoneId">
        <option selected>Selectionnez la branche</option>
        <?php foreach ($zones as $zone) : ?>
            <option value="<?= $zone['zone_id'] ?>">
            <?= $zone['zone_id'] ?> - <?= $zone['zone_name'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>
<div class="mb-3">
        <label for="serviceId" class="form-label">Services:</label>
        <select class="form-select"  name="serviceId">
        <option selected>Selectionnez le service</option>
        <?php foreach ($services as $service) : ?>
            <option value="<?= $service['service_id'] ?>">
              <?= $service['service_id'] ?>
            </option>
        <?php endforeach; ?>
        </select>
</div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Page de création d'une salle";
//call the template create in views.
require "./views/template.php";

?>
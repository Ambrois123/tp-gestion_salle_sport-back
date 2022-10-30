<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/zone/validateCreate" class="container pb-3">
  <div class="mb-3">
    <label for="zone_name" class="form-label">Nom de la zone</label>
    <input type="text" class="form-control" id="zone_name" name="zone_name">
  </div>
  <div class="mb-3">
        <label for="clientId" class="form-label">Salle:</label>
        <select class="form-select"  name="clientId">
        <option selected>Selectionnez la salle</option>
        <?php foreach ($salles as $salle) : ?>
            <option value="<?= $salle['salle_id'] ?>">
            <?= $salle['salle_id'] ?> - <?= $salle['salle_name'] ?>
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
$title = "Page de création d'une zone";
//call the template create in views.
require "./views/template.php";

?>
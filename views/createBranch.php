<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/branche/validateCreate" class="container pb-3">
  <div class="mb-3">
    <label for="branch_name" class="form-label">Nom de la branche</label>
    <input type="text" class="form-control" id="branch_name" name="branch_name">
  </div>
  <div class="mb-3">
        <label for="salleId" class="form-label">Salles:</label>
        <select class="form-select" aria-label="Default select example" name="salleId">
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
$title = "Page de création d'une branche";
//call the template create in views.
require "./views/template.php";

?>
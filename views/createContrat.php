<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/contrat/validateCreate" class="container pb-3">
<div class="mb-3">
    <label for="contrat_name" class="form-label">Nom du contrat</label>
    <input type="text" class="form-control" id="contrat_name" name="contrat_name">
  </div>

  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Page de création d'un contrat";
//call the template create in views.
require "./views/template.php";

?>
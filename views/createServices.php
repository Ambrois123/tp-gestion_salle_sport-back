<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/services/validateCreate" class="container pb-3">
  <div class="mb-3">
    <label for="service_name" class="form-label">Nom de la fonctionnalité</label>
    <input type="text" class="form-control" id="service_name" name="service_name">
  </div>
  
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Page de création d'un service";
//call the template create in views.
require "./views/template.php";

?>
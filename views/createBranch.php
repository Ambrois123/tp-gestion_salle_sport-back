<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/branche/validateCreate" class="container pb-3">
  <div class="mb-3">
    <label for="branch_name" class="form-label">Nom de la branche</label>
    <input type="text" class="form-control" id="branch_name" name="branch_name">
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
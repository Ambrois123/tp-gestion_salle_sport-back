<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/clients/validateCreate" class="container pb-3">
  <div class="mb-3">
    <label for="client_name" class="form-label">Nom</label>
    <input type="text" class="form-control" id="client_name" name="client_name">
  </div>
  <div class="mb-3">
    <label for="client_email" class="form-label">Email</label>
    <input type="client_email" class="form-control" id="client_email" name="client_email">
  </div>
  <div class="mb-3">
    <label for="client_tel" class="form-label">Téléphone</label>
    <input type="phoneNumber" class="form-control" id="client_tel" name="client_tel">
  </div>
  <div class="mb-3">
    <label for="client_address" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="client_address" name="client_address">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="client_active" name="client_active">
    <label class="form-check-label" for="exampleCheck1">Actif</label>
  </div>
  <div class="mb-3">
    <label for="client_description" class="form-label">Description</label>
    <textarea name="client_description" id="client_description" rows="10" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="client_presentation" class="form-label">Présentation</label>
    <textarea name="client_presentation" id="client_presentation" rows="10" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="client_url" class="form-label">Url</label>
    <input type="text" class="form-control" id="client_url" name="client_url">
  </div>
  <div class="mb-3">
  <label for="client_logo" class="form-label">Logo</label>
  <input class="form-control" type="file" id="client_logo" multiple>
</div>
  <div class="mb-3">
    <label for="client_dpo" class="form-label">Dpo</label>
    <input type="text" class="form-control" id="client_dpo" name="client_dpo">
  </div>
  <div class="mb-3">
    <label for="client_tech" class="form-label">Technicien</label>
    <input type="text" class="form-control" id="client_tech" name="client_tech">
  </div>
  <div class="mb-3">
    <label for="client_com" class="form-label">Commercial</label>
    <input type="text" class="form-control" id="client_com" name="client_com">
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Page de création d'un client";
//call the template create in views.
require "./views/template.php";

?>
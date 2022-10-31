<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($services as $service) : ?>
      <?php if(empty($_POST['service_id']) || $_POST['service_id'] !== $service['service_id']) : ?>
    <tr>
      <td><?= $service['service_id'] ?></td>
      <td><?= $service['service_name'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>" />
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/services/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer cette service?')">
              <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>" />
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
      </td>
    </tr>
    <?php else : ?>
      <form method="POST" action="<?= URL ?>admin/services/updateValidate">
      <tr>
      <td><?= $service['service_id'] ?></td>
      <td>
        <input type="text" name="service_name" value="<?= $service['service_name'] ?>" />
      </td>
      <td>
        
          <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>" />
          <button class='btn btn-primary'>Valider</button>
      </td>
    </tr>
    </form>
    <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Les services";
//call the template create in views.
require "./views/template.php";

?>

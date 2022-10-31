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
    <?php foreach($zones as $zone) : ?>
      <?php if(empty($_POST['zone_id']) || $_POST['zone_id'] !== $zone['zone_id']) : ?>
    <tr>
      <td><?= $zone['zone_id'] ?></td>
      <td><?= $zone['zone_name'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="zone_id" value="<?= $zone['zone_id'] ?>" />
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/zone/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer cette zone?')">
              <input type="hidden" name="zone_id" value="<?= $zone['zone_id'] ?>" />
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
      </td>
    </tr>
    <?php else : ?>
      <form method="POST" action="<?= URL ?>admin/zone/updateValidate">
      <tr>
      <td><?= $zone['zone_id'] ?></td>
      <td>
        <input type="text" name="zone_name" value="<?= $zone['zone_name'] ?>" />
      </td>
      <td>
        
          <input type="hidden" name="zone_id" value="<?= $zone['zone_id'] ?>" />
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
$title = "Les zones";
//call the template create in views.
require "./views/template.php";

?>

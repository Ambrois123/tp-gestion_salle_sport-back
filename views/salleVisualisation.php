<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Actif</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($salles as $salle) : ?>
      <?php if(empty($_POST['salle_id']) || $_POST['salle_id'] !== $salle['salle_id']) : ?>
    <tr>
      <td><?= $salle['salle_id'] ?></td>
      <td><?= $salle['salle_name'] ?></td>
      <td><?= $salle['salle_address'] ?></td>
      <td><?= $salle['salle_active'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="salle_id" value="<?= $salle['salle_id'] ?>" />
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/salles/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer cette salle ?')">
              <input type="hidden" name="salle_id" value="<?= $salle['salle_id'] ?>" />
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
      </td>
    </tr>
    <?php else :?>
      <form method="POST" action="<?= URL ?>admin/salles/updateValidate">
      <tr>
      <td><?= $salle['salle_id'] ?></td>
      <td>
        <input type="text" value="<?= $salle['salle_name'] ?>" name="salle_name" />
      </td>
      <td>
        <input type="text" value="<?= $salle['salle_address'] ?>" name="salle_address" />
      </td>
      <td>
        <input type="checkbox" value="<?= $salle['salle_active'] ?>" name="salle_active" />
      </td>
      <td>
        
          <input type="hidden" name="salle_id" value="<?= $salle['salle_id'] ?>" />
          <button class='btn btn-primary'>Valider</button>
      </td>
    </tr>
    </form>
    <?php endif ?>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Les salles";
//call the template create in views.
require "./views/template.php";

?>

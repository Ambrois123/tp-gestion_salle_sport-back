<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Type de contrat</th>

      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($contrats as $contrat) : ?>
      <?php if(empty($_POST['contrat_id']) || $_POST['contrat_id'] !== $contrat['contrat_id']) : ?>
    <tr>
      <td><?= $contrat['contrat_id'] ?></td>
      <td><?= $contrat['contrat_name'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="contrat_id" value="<?= $contrat['contrat_id'] ?>"/>
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/contrat/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer ce contrat ?')">
              <input type="hidden" name="contrat_id" value="<?= $contrat['contrat_id'] ?>" />
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
      </td>
    </tr>
    <?php else : ?>
      <form method="POST" action="<?= URL ?>admin/contrat/updateValidate">
      <tr>
      <td><?= $contrat['contrat_id'] ?></td>
      <td>
        <input type="text" name="contrat_name" value="<?= $contrat['contrat_name'] ?>" />
      </td>
      <td>
        
          <input type="hidden" name="contrat_id" value="<?= $contrat['contrat_id'] ?>"/>
          <button class='btn btn-primary'>Valider</button>
        
      </td>
    </tr>
    </form>
    <?php endif;?>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Les contrats";
//call the template create in views.
require "./views/template.php";

?>

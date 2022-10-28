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
    <?php foreach($branches as $branch) : ?>
    <tr>
      <td><?= $branch['branch_id'] ?></td>
      <td><?= $branch['branch_name'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="branch_id" value="<?= $branch['branch_id'] ?><">
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/branche/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer cette branche?')">
              <input type="hidden" name="branch_id" value="<?= $branch['branch_id'] ?><">
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
//Put the content in the variable content
$content = ob_get_clean();
//title of the page
$title = "Les branches";
//call the template create in views.
require "./views/template.php";

?>

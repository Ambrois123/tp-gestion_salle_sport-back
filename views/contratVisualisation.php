<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Formule essentielle</th>
      <th scope="col">Formule premium</th>
      <th scope="col">Formule business</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($contrats as $contrat) : ?>
    <tr>
      <td><?= $contrat['contrat_id'] ?></td>
      <td><?= $contrat['formule_esssentiel'] ?></td>
      <td><?= $contrat['formule_premium'] ?></td>
      <td><?= $contrat['formule_business'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="contrat_id" value="<?= $contrat['contrat_id'] ?><">
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/contrat/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer ce contrat ?')">
              <input type="hidden" name="contrat_id" value="<?= $contrat['contrat_id'] ?><">
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
$title = "Les contrats";
//call the template create in views.
require "./views/template.php";

?>

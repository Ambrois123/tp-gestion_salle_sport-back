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
    <tr>
      <td><?= $salle['salle_id'] ?></td>
      <td><?= $salle['salle_name'] ?></td>
      <td><?= $salle['salle_address'] ?></td>
      <td><?= $salle['salle_active'] ?></td>
      <td><button class='btn btn-warning'>Modifier</button></td>
      <td><button class='btn btn-danger'>Supprimer</button></td>
    </tr>
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

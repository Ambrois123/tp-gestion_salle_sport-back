<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Adresse</th>
      <th scope="col">Actif</th>
      <th scope="col">Description</th>
      <th scope="col">Présentation</th>
      <th scope="col">Adresse web</th>
      <th scope="col">Logo</th>
      <th scope="col">DPO</th>
      <th scope="col">Technicien</th>
      <th scope="col">Commercial</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($clients as $client) : ?>
    <tr>
      <td><?= $client['client_id'] ?></td>
      <td><?= $client['client_name'] ?></td>
      <td><?= $client['client_email'] ?></td>
      <td><?= $client['client_tel'] ?></td>
      <td><?= $client['client_address'] ?></td>
      <td><?= $client['client_active'] ?></td>
      <td><?= $client['client_description'] ?></td>
      <td><?= $client['client_presentation'] ?></td>
      <td><?= $client['client_url'] ?></td>
      <td><?= $client['client_logo'] ?></td>
      <td><?= $client['client_dpo'] ?></td>
      <td><?= $client['client_tech'] ?></td>
      <td><?= $client['client_com'] ?></td>
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
$title = "Les clients";
//call the template create in views.
require "./views/template.php";

?>

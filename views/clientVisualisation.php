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
    <?php foreach ($clients as $client) : ?>
      <!--verify if client try to update is the good one. if it is good line will be change into a form contact-->
      <?php if (empty($_POST['client_id']) || $_POST['client_id'] !== $client['client_id']) : ?>
        <tr>
          <td><?= $client['client_id'] ?></td>
          <td><?= $client['client_name'] ?></td>
          <td><?= $client['client_email'] ?></td>
          <td><?= $client['client_tel'] ?></td>
          <td><?= $client['client_address'] ?></td>
          <td><?= $client['client_active'] ?></td>
          <td><?= $client['client_url'] ?></td>
          <td><?= $client['client_logo'] ?></td>
          <td><?= $client['client_dpo'] ?></td>
          <td><?= $client['client_tech'] ?></td>
          <td><?= $client['client_com'] ?></td>
          <td>
            <!--form modification-->
            <!--action empty cause call the same page-->
            <form method="POST" action="">
              <input type="hidden" name="client_id" value="<?= $client['client_id'] ?>">
              <button class='btn btn-warning' type="submit">Modifier</button>

            </form>
          </td>
          <td>
            <form method="POST" action="<?= URL ?>admin/clients/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?')">
              <input type="hidden" name="client_id" value="<?= $client['client_id'] ?>">
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
          </td>
        </tr>
        <?php else : ?>
          <form method="POST" action="<?= URL ?>/admin/clients/updateValidate">
                <tr>
                  <td><?= $client['client_id'] ?></td>
                  <td><input type="text" name="client_name" value="<?= $client['client_name'] ?>"></td>
                  <td><input type="text" name="client_email" value="<?= $client['client_email'] ?>"></td>
                  <td><input type="text" name="client_tel" value="<?= $client['client_tel'] ?>"></td>
                  <td><input type="text" name="client_address" value="<?= $client['client_address'] ?>"></td>
                  <td><input type="checkbox" name="client_active" value="<?= $client['client_active'] ?>"></td>
                  <td><input type="text" name="client_url" value="<?= $client['client_url'] ?>"></td>
                  <td><input type="file" name="client_logo" value="<?= $client['client_logo'] ?>"></td>
                  <td><input type="text" name="client_dpo" value="<?= $client['client_dpo'] ?>"></td>
                  <td><input type="text" name="client_tech" value="<?= $client['client_tech'] ?>"></td>
                  <td><input type="text" name="client_com" value="<?= $client['client_com'] ?>"></td>
                  <td colspan="2">
                  <input type="hidden" name="client_id" value="<?= $client['client_id'] ?>">
                  <button class='btn btn-primary' type="submit">Valider</button>
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
$title = "Les clients";
//call the template create in views.
require "./views/template.php";

?>
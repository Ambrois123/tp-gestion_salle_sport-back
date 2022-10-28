<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gestion memb</th>
      <th scope="col">Gestion abon</th>
      <th scope="col">Gestion collabo</th>
      <th scope="col">Gestion compta</th>
      <th scope="col">Gestion prelev</th>
      <th scope="col">Relance imp</th>
      <th scope="col">Access tourn</th>
      <th scope="col">Access badge</th>
      <th scope="col">Access qrcode</th>
      <th scope="col">Video Surv</th>
      <th scope="col">Vente boisson</th>
      <th scope="col">Vente boisson</th>
      <th scope="col">Organisation Even</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($services as $service) : ?>
    <tr>
      <td><?= $service['service_id'] ?></td>
      <td><?= $service['gestion_membres'] ?></td>
      <td><?= $service['gestion_abonnement'] ?></td>
      <td><?= $service['gestion_collabo'] ?></td>
      <td><?= $service['gestion_compta'] ?></td>
      <td><?= $service['gestion_prelevement'] ?></td>
      <td><?= $service['relance_imp'] ?></td>
      <td><?= $service['acces_tourniquet'] ?></td>
      <td><?= $service['acces_badge'] ?></td>
      <td><?= $service['acces_qrcode'] ?></td>
      <td><?= $service['video_surv'] ?></td>
      <td><?= $service['vente_boisson'] ?></td>
      <td><?= $service['org_evenement'] ?></td>
      <td>
        <form method="POST" action="">
          <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>">
          <button class='btn btn-warning'>Modifier</button>
        </form>
      </td>
      <td>
      <form method="POST" action="<?= URL ?>admin/services/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?')">
              <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>">
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
$title = "Les services";
//call the template create in views.
require "./views/template.php";

?>

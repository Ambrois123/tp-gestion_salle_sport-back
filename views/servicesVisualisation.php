<?php ob_start(); ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Membre</th>
      <th scope="col">Abonnement</th>
      <th scope="col">Collaboraeur</th>
      <th scope="col">Compta</th>
      <th scope="col">Prélèvement</th>
      <th scope="col">Impayé</th>
      <th scope="col">Access tourn</th>
      <th scope="col">Access badge</th>
      <th scope="col">Access qrcode</th>
      <th scope="col">Video Surv</th>
      <th scope="col">Vente boisson</th>
      <th scope="col">Organisation Even</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!--loops to browse-->
    <?php foreach($services as $service) : ?>
      <?php if(empty($_POST['service_id']) || $_POST['service_id'] !== $service['service_id']) : ?>
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
            <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>"  />
            <button class='btn btn-warning'>Modifier</button>
          </form>
      </td>
      <td>
            <form method="POST" action="<?= URL ?>admin/services/validateDelete" onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?')">
              <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>" />
              <button class='btn btn-danger' type="submit">Supprimer</button>
            </form>
      </td>
    </tr>
    <?php else : ?>
      <form method="POST" action="<?= URL ?>admin/services/updateValidate">
      <tr>
      <td><?= $service['service_id'] ?></td>
      <td><input type="checkbox" value="<?= $service['gestion_membres'] ?>" name="gestion_membres" /></td>
      <td><input type="checkbox" value="<?= $service['gestion_abonnement'] ?>" name="gestion_abonnement" /></td>
      <td><input type="checkbox" value="<?= $service['gestion_collabo'] ?>" name="gestion_collabo" /></td>
      <td><input type="checkbox" value="<?= $service['gestion_compta'] ?>" name="gestion_compta" /></td>
      <td><input type="checkbox" value="<?= $service['gestion_prelevement'] ?>" name="gestion_prelevement" /></td>
      <td><input type="checkbox" value="<?= $service['relance_imp'] ?>" name="relance_imp" /></td>
      <td><input type="checkbox" value="<?= $service['acces_tourniquet'] ?>" name="acces_tourniquet" /></td>
      <td><input type="checkbox" value="<?= $service['acces_badge'] ?>" name="acces_badge" /></td>
      <td><input type="checkbox" value="<?= $service['acces_qrcode'] ?>" name="acces_qrcode" /></td>
      <td><input type="checkbox" value="<?= $service['video_surv'] ?>" name="video_surv" /></td>
      <td><input type="checkbox" value="<?= $service['vente_boisson'] ?>" name="vente_boisson" /></td>
      <td><input type="checkbox" value="<?= $service['org_evenement'] ?>" name="org_evenement" /></td>
      <td>
          
            <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>" />
            <button class='btn btn-primary'>Modifier</button>
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

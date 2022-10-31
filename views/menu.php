<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BasicSport</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <!--verify before get panel admin-->

        <?php if (!Security::verifyAccessSession()) : ?>

        <li class="nav-item">
            <!--way to login page-->
          <a class="nav-link" href="<?= URL ?>admin/login">Login</a>
        </li>

        <!--verify before get panel admin-->
        <?php else : ?>

        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/adminPanel">Administrateur</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Client
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/clients/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>admin/clients/creation">Création</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Branche
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/branche/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>admin/branche/creation">Création</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            contrat
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/contrat/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>admin/contrat/creation">Création</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Zone
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/zone/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>admin/zone/creation">Création</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/services/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>admin/services/creation">Création</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Salle
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URL ?>admin/salles/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item" href="<?= URL ?>admin/salles/creation">Création</a></li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/deconnexion">Deconnexion</a>
        </li>

        <!--verify before get panel admin-->
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
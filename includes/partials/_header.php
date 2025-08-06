<header class="mb-5">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../index.php">Find My Dream Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end w-100">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Maisons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Appartement</a>
        </li>
        <!-- Bouton ajouter -->
        <?php if(isset($_SESSION['username']) && isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true ) : ?>
            <li class="nav-item">
                 <a class="nav-link" href="#">Ajouter</a>
            </li>
        <?php endif; ?>
        <?php if( isset($_SESSION['username']) && isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) : ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Me déconnecter</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="../../pages/login.php">Se connecter</a>
            </li>
        <?php endif; ?>
        <?php if( isset($_SESSION['username']) && isset($_SESSSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true ) : ?>
            <li class="nav-item">
                <a class="nav-link" href="../../pages/login.php">Se connecter</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</header>
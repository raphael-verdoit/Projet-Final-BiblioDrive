<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<header>
    <div class="text">
        La bibliotheque de Moulinsart est fermer au public jusqu'a nouvel ordre. Mais il est possible de retirer vos livres via notre service bibliodrive !
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="../accueuil.php">BiblioDrive</a>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="./php/#.php">Livres</a>
        </li>
      </ul>

      <div class="d-flex">
        <?php if(isset($_SESSION['mel'])): ?>
            <span class="navbar-text me-3">
                Bonjour, <strong><?php echo htmlspecialchars($_SESSION['mel']); ?></strong>
            </span>
            <a href="./php/panier.php" class="btn btn-outline-primary me-2">Mon Panier</a>
            <a href="./php/logout.php" class="btn btn-outline-danger">Déconnexion</a>
        <?php else: ?>
            <a href="./php/login.php" class="btn btn-outline-success">Connexion</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
</header>
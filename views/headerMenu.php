<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">e-Projet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Projet
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="http://<?= ROOT_DIR ?>addProject">Ajouter</a>
          <a class="dropdown-item" href="http://<?= ROOT_DIR ?>updateProject">Modifier</a>
          <a class="dropdown-item" href="http://<?= ROOT_DIR ?>searchProject">Rechercher</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Etats
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Fiche Projet</a>
          <a class="dropdown-item" href="http://<?= ROOT_DIR ?>printAllProjects">Tous les projets</a>
          <a class="dropdown-item" href="#">Projets par chef projet</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://<?= ROOT_DIR ?>printDoneProjects">Projets finis</a>
          <a class="dropdown-item" href="http://<?= ROOT_DIR ?>printLateProjects">Projets en retard</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Statistiques
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Test</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
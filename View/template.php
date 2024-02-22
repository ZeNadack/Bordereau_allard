<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
<nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
<div class="d-flex" style="height:25px;">
  <div class="vr"></div>
</div>
    <div class="container-fluid">
      <a class="navbar-brand">Les RATT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#forum_navbar" aria-controls="forum_navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
      <div class="vr"></div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Accueil.php">Accueil<span class="sr-only">(Page actuelle)</span></a>
          </li>
          <div class="vr"></div>
          <li class="nav-item">
            <a class="nav-link" href="Profil.php">Profil</a>
          </li>
          <div class="vr"></div>
          <li class="nav-item">         
            <a class="nav-link" href="#">Bordereau</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-middle">
  <div class="d-flex" style="height:60px;">
  <div class="vr"></div>
</div>
  </nav>
</br>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlepage ?></title>

</head>
<body>
<header>
    <?= $content ?>
        <footer>
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-bottom">
            <div class="d-flex" style="height:5px;">
            <div class="vr"></div>            
            <nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-middle">
            <div class="d-flex" style="height:100px;">
            <div class="vr"></div>
        </footer>
</header>
</body>
<script src="../js/jquery-3.7.0.js"></script>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript" src="form.js"></script>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
$titlepage = "InscriptionView";
$style = "";
$title = "Inscription";
$soutitle = "";
ob_start();
?>

<form method="post">
    <label for="insmail">Adresse e-mail</label>
    <input type="email" name="insmail" id="insmail">

    <label for="mdp">Mot de passe</label>
    <input type="password" name="insmdp" id="insmdp">

    <label for="nom">Nom</label>
    <input type="text" name="insnom" id="insnom">

    <label for="prenom">Prenom</label>
    <input type="text" name="insprenom" id="insprenom">

    <label for="born">Date de naissance</label>
    <input type="text" name="insborn" id="insborn">

    <label>S'inscrire</label>
    <input type="submit" name="btninscri" value="Inscription">
</form>

<form method="" action="../Controller/Connexion.php">
    <label>Déjà inscrit?</label>
    <input type="submit" name="btnreco" value="Connexion">
</form>

<?php
$content=ob_get_clean();
include('..\View\templateAccueil.php');
?>
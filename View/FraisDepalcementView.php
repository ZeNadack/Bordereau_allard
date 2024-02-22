<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
$titlepage = "FraisDeplacementView";
$style = "";
$title = "FraisDeplacement";
$soutitle = "";
ob_start();
$serveur="localhost";
    $nom="root";
    $motdepasse="SxdoRDXjkmQ0YJhI";
    $base="m2lallardblanchardhuberdauxhaddad";
?>

<form method="post">
    <label for="motif">Motif :</label>
    <input type="text" name="motif" id="motif">

    <br><br>

    <label for="trajet">Trajet :</label>
    <input for="text" name="trajet" id="trajet">

    <br><br>

    <label for="kmparcourus">Km Parcourus :</label>
    <input for="text" name="kmparcourus" id="kmparcourus">

    <br><br>

    <label for="couttrajet">Coût Trajet :</label>
    <input for="couttrajet" name="couttrajet" id="couttrajet">

    <br><br>

    <label for="peages">Péages :</label>
    <input for="text" name="peages" id="peages">

    <br><br>

    <label for="repas">Repas :</label>
    <input for="text" name="repas" id="repas">

    <br><br>

    <label for="hebergement">Hébergemnet :</label>
    <input for="text" name="hebergement" id="hebergement">

    <br><br>

    <input type="submit" name="btneffacer" value="Effacer">
    <input type="submit" name="btnvalider" value="Valider">
</form>

<form method="" action="../Controller/Accueil.php">
    <button type="submit" name="btnaccueil" value="Accueil">Accueil</button>
</form>

<form method="" action="">
    <button type="submit" name="btnvueensemble" value="Vue d'ensemble">Vue d'ensemble</button>
</form>

<?php
$content=ob_get_clean();
include('..\View\templateAccueil.php');
?>
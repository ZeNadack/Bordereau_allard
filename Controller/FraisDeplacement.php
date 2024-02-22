<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
$titlepage = "FraisDeplacementView";
$style = "";
$title = "FraisDeplacement";
$soutitle = "";
ob_start();
?>

<form method="post">
    <label for="motif">Motif</label>
    <input type="text" name="motif" id="motif">

    <label for="trajet">Trajet</label>
    <input for="text" name="trajet" id="trajet">

    <label for="kmparcourus">Km Parcourus</label>
    <input for="text" name="kmparcourus" id="kmparcourus">

    <label for="couttrajet">Coût Trajet</label>
    <input for="couttrajet" name="couttrajet" id="couttrajet">

    <label for="peages">Péages</label>
    <input for="
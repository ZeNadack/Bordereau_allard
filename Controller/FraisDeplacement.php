<?php
session_start();
include ("..\Model\Fonctions.php");

if (isset($_POST['btnaccueil']) && $_POST['btnaccueil'] == "Accueil") {
    header('Location: Accueil.php');
}
include("..\View\FraisDepalcementView.php");
?>
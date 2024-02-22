<?php
session_start();
include("..\Model\Fonctions.php");

if(isset($_POST['btnAccueil']) && $_POST['btnAccueil']=='Accueil')
{
    header("Location:Accueil.php");
}

include('..\View\ProfilView.php');
?>
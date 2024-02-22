<?php
session_start();


include ('..\Model\Fonctions.php');


if (isset($_POST['accueil']) && $_POST['btnreco'] == "Accueil") 
{
    header('Location: Accueil.php');
}

include('..\View\ListeFraisView.php');
?>
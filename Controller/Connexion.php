<?php
session_start();
include ('..\Model\Fonctions.php');

if(isset($_POST['BtnConnexion']) && $_POST['BtnConnexion']=='Connexion')
{
    $result=SelectunCritere("adherent", "adressemail", $_POST['mail']);
    if($line=$result->fetch())
    {
        $saisie = password_verify($_POST['mdp'],$line['motdepasse']);
        if($saisie == 1)
        {
            $_SESSION['mail']=$_POST['mail'];
            header("Location:Accueil.php"); 
        }
    }
    else
    {
        echo "Réessayer";
    }
}

if(isset($_POST['BtnPasdeCompte']) && $_POST['BtnPasdeCompte']=='NoCompte')
{
    header("Location:inscription.php");
}

include('..\View\connexionView.php');
?>
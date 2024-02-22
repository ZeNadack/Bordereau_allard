<?php
session_start();
include ("..\Model\Fonctions.php");


if (isset($_POST['btninscri']) && $_POST['btninscri'] == "Inscription") {
    $mdp = $_POST['insmdp'];
    $mail = $_POST['insmail'];
    $nom = $_POST['insnom'];
    $prenom = $_POST['insprenom'];
    $born = $_POST['insborn'];

    $hash = password_hash($mdp, PASSWORD_BCRYPT);

    $sql = "INSERT INTO adherent (adressemail, motdepasse, nom, prenom, datenaiss) VALUES ('$mail', '$hash', '$nom', '$prenom', '$born')";
    InsertBindParam($_SESSION['mail'], $hash, $nom, $prenom, $born);
    AutreRequete($sql);

    $result = Select('adherent');
    while($line = $result->fetch()) 
    {
        $hash = password_hash($line['motdepasse'], PASSWORD_BCRYPT);
        $query  = ("UPDATE adherent SET motdepasse = '".$hash."' WHERE adressemail = '"  .$line['adressemail']. "'");
        AutreRequete($query);
    }
}


    if (isset($_POST['btnreco']) && $_POST['btnreco'] == "Connexion") {
        header('Location: Connexion.php');
    }

include('../View/inscriptionView.php');
?>
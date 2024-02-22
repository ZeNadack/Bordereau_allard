<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<?php
$titlepage="Page";
$style="";
$title = "Profil";
$soustitle = "";
ob_start();
$serveur="localhost";
    $nom="root";
    $motdepasse="SxdoRDXjkmQ0YJhI";
    $base="m2lallardblanchardhuberdauxhaddad";
?>
<?php
if (isset($_POST['ModifInfo']))
    {
        try{
            $pdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $base, $nom, $motdepasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }

    }
if (isset($_POST['SuppAssociation']) && $_POST['SuppAssociation'] == 'SuppAssociation' && isset($_POST['Association'])) {
    try {
        $pdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $base, $nom, $motdepasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer le nom de l'association sélectionnée
        $nomAssociation = $_POST['Association'];

        // Récupérer l'id de l'adhérent à partir de la session
        $queryAdherent = "SELECT idadherent FROM adherent WHERE adressemail = :mail";
        $stmtAdherent = $pdo->prepare($queryAdherent);
        $stmtAdherent->bindParam(':mail', $_SESSION['mail']);
        $stmtAdherent->execute();
        $idadherent = $stmtAdherent->fetchColumn();

        // Récupérer l'id de l'association à partir de son nom
        $queryAssociation = "SELECT idassociation FROM association WHERE nomligue = :nomAssociation";
        $stmtAssociation = $pdo->prepare($queryAssociation);
        $stmtAssociation->bindParam(':nomAssociation', $nomAssociation);
        $stmtAssociation->execute();
        $idassociation = $stmtAssociation->fetchColumn();

        // Supprimer la relation dans la table correspondre
        $queryDelete = "DELETE FROM correspondre WHERE idadherent = :idadherent AND idassociation = :idassociation";
        $stmtDelete = $pdo->prepare($queryDelete);
        $stmtDelete->bindParam(':idadherent', $idadherent);
        $stmtDelete->bindParam(':idassociation', $idassociation);
        $stmtDelete->execute();

        echo "Association supprimée avec succès!";
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    }
}
?>
<table>
    <tr>
<form action = "" method="POST">
        <button type="submit" name="btnAccueil" value="Accueil">Accueil</button></br>
        Nom
        <?php $pdo = new PDO("mysql:host=".$serveur.";dbname=".$base,$nom,$motdepasse);
        $lenom = "SELECT nom FROM adherent WHERE adressemail = '" .$_SESSION['mail']. "'";
        $uwerg = $pdo->query($lenom);
        $jsp = $uwerg->fetch();
        $unnom=$jsp['nom'];
        echo '<input type="text" name="" value="' . $unnom . '">';
        ?>
        </br>
        Prénom
        <?php
        $leprenom = "SELECT prenom FROM adherent WHERE adressemail = '" .$_SESSION['mail']. "'";
        $final = $pdo->query($leprenom);
        $noob = $final->fetch();
        $unprenom=$noob['prenom'];
        echo '<input type="text" name="" value="' . $unprenom . '">';
        ?>
        <br>
        Mail
        <?php
        $lemail = "SELECT adressemail FROM adherent WHERE adressemail = '" .$_SESSION['mail']. "'";
        $oui = $pdo->query($lemail);
        $rien = $oui->fetch();
        $unmail=$rien['adressemail'];
        echo '<input type="text" name="" value="' . $unmail . '">';
        ?>
        <br>
        <label >Date Naissance</label>
        <?php
        $ladate = "SELECT datenaiss FROM adherent WHERE adressemail = '" .$_SESSION['mail']. "'";
        $vil = $pdo->query($ladate);
        $non = $vil->fetch();
        $unedate=$non['datenaiss'];
        echo '<input type="text" name="" value="' . $unedate . '">';
        ?>
        <br>
        <label >Ville</label>
        <?php
        $laville = "SELECT ville FROM adherent WHERE adressemail = '" .$_SESSION['mail']. "'";
        $arf = $pdo->query($laville);
        $adragon = $arf->fetch();
        $uneville=$adragon['ville'];
        echo '<input type="text" name="" value="' . $uneville . '">';
        ?>
        <br>
        <label >Votre/Vos association(s)</label>
        <select name="Association" id="Association">
        <?php

        $pitiefonctionne = "SELECT nomligue FROM association INNER JOIN correspondre ON association.idassociation=correspondre.idassociation INNER JOIN adherent ON correspondre.idadherent=adherent.idadherent WHERE adherent.adressemail = '" .$_SESSION['mail']. "'";
        $connect = Connexion();
        $resultat = $connect->query($pitiefonctionne);

        while ($association = $resultat->fetch()) {
            $option = '<option value="' . $association['nomligue'] . '">' . $association['nomligue'] . '</option>';
            $liste_deroulante .= $option;
        }
        echo $liste_deroulante;
        ?><br>   
</tr><br>
<button type="submit" name="SuppAssociation" value="SuppAssociation">Supprimer association</button><br><br><br>
<button type="submit" name="ModifInfo" value="ModifInfo">Modifier l'information</button>
</table>
<?php
include('..\View\template.php');
?>
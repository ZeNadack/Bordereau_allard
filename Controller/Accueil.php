<?php
session_start();
include('..\Model\Fonctions.php');

$serveur="localhost";
    $nom="root";
    $motdepasse="SxdoRDXjkmQ0YJhI";
    $base="m2lallardblanchardhuberdauxhaddad";

if($_SESSION['mail'] == true)
{
    include('..\View\AccueilView.php');
}
else
{
    header('Location:Connexion.php');
}

if(isset($_POST['BtnDeconnexion']) && $_POST['BtnDeconnexion']=='Deconnexion')
{
    session_destroy();
    header("Location:Connexion.php");
}

if (isset($_POST['BtnAjoutAssoc']) && $_POST['BtnAjoutAssoc'] == 'Ajout' && isset($_POST['assoc'])) {
    try {
        $pdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $base, $nom, $motdepasse);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si la connexion PDO a été établie avec succès
        if (!$pdo) {
            throw new Exception("La connexion à la base de données a échoué.");
        }

        // Récupérer l'id de l'association sélectionnée
        $idassociation = $_POST['assoc'];

        // Récupérer l'id de l'adhérent à partir de la session
        $query = "SELECT idadherent FROM adherent WHERE adressemail = :mail";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':mail', $_SESSION['mail']);
        $stmt->execute();
        $idadherent = $stmt->fetchColumn();

        // Commencer la transaction
        $pdo->beginTransaction();

        // Insérer la relation dans la table correspondre
        $queryInsert = "INSERT INTO correspondre (idadherent, idassociation) VALUES (:idadherent, :idassociation)";
        $stmtInsert = $pdo->prepare($queryInsert);
        $stmtInsert->bindParam(':idadherent', $idadherent);
        $stmtInsert->bindParam(':idassociation', $idassociation);
        $stmtInsert->execute();

        // Valider la transaction
        $pdo->commit();

        echo "Association ajoutée avec succès!";
    } catch (PDOException $e) {
        // Annuler la transaction en cas d'erreur
        $pdo->rollBack();
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
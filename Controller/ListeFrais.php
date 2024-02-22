<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste Frais de Déplacement</title>
        <link href="../CSS/StyleAccueil.css" rel="stylesheet" type="text/css" />
<head>
<?php
session_start();
include('..\Model\Fonctions.php');

$serveur="localhost";
    $nom="root";
    $motdepasse="SxdoRDXjkmQ0YJhI";
    $base="m2lallardblanchardhuberdauxhaddad";
?>
<body>
    <?php
         {
            // Commencez le tableau
            echo '<table border="2" style="margin: auto; width: 60%;">
                    <tr>
                        <th>Date</th>
                        <th>Motif</th>
                        <th>Trajet</th>
                        <th>Kms Parcourus</th>
                        <th>Péages</th>
                        <th>Repas</th>
                        <th>Hébergement</th>
                        <th>Total</th>
                    </tr>';
        // Utilisation de fetch_object dans une boucle pour récupérer tous les frais de déplacement
        while ($row = $result->fetch_object()) 
        {
            // Commencez une nouvelle ligne dans le tableau pour chaque résultat
            echo '<tr>';
            echo '<td>' . $row->Date . '</td>';
            echo '<td>' . $row->Motif . '</td>';
            echo '<td>' . $row->Trajet . '</td>';
            echo '<td>' . $row->Km_parcouru . '</td>';
            echo '<td>' . $row->Coût . '</td>';
            echo '<td>' . $row->Peages . '</td>';
            echo '<td>' . $row->Repas . '</td>';
            echo '<td>' . $row->Hebergement . '</td>';
            echo '</tr>';
        }
        }
    ?>
</body>
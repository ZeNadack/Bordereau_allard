<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Frais de Déplacement</title>
    <link href="../CSS/Style.css" rel="stylesheet" type="text/css" />
</head>
<header>
    <button class="BoutonA"><a href="Accueil.php">Retour à l'accueil principal</a></button>
    <h2 class="Titre">Liste des Frais de Déplacement<h2>
</header>
<br><br><br><br><br><br><br><br>
<body>
<?php
session_start(); // Démarrez la session

// Connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = 'SxdoRDXjkmQ0YJhI';
$database = 'm2lratt';

// On établit la connexion
$conn = new mysqli($servername, $username, $password, $database);

// On vérifie la connexion
if ($conn->connect_error) {
    die('Erreur : ' . $conn->connect_error);
}

// Vérifie si le formulaire pour supprimer un déplacement a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['depla'])) {
    $idSuppr = $_POST['depla'];
    $req = $conn->prepare("DELETE FROM `deplacement` WHERE `Iddeplacement` = ?");
    $req->bind_param("i", $idSuppr);

    // Exécute la requête
    if ($req->execute()) {
        echo "<p>Le déplacement a été supprimé avec succès.</p>";
    } else {
        echo "<p>Erreur: " . $conn->error . "</p>";
    }

    // Ferme la requête préparée
    $req->close();
}
?>
    <?php
    // Requête SQL pour récupérer les frais de déplacement
    $req = "SELECT Iddeplacement, DateD, Motif, Trajet, Km_parcouru, Cout_trajet, Peages, Repas, Hebergement 
            FROM deplacement";
    $result = $conn->query($req);

    if ($result && $result->num_rows > 0) {
        // Commencez le tableau
        echo '<table border="2" style="margin: auto; width: 60%;">
                <tr>
                    <th>Date</th>
                    <th>Motif</th>
                    <th>Trajet</th>
                    <th>Kms Parcourus</th>
                    <th>Coût</th>
                    <th>Péages</th>
                    <th>Repas</th>
                    <th>Hébergement</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>';
        // Utilisation de fetch_assoc dans une boucle pour récupérer tous les frais de déplacement
        while ($row = $result->fetch_assoc()) {
            // Calcul du total
            $total = $row['Cout_trajet'] + $row['Peages'] + $row['Repas'] + $row['Hebergement'];

            // Commencez une nouvelle ligne dans le tableau pour chaque résultat
            echo '<tr>';
            echo '<td>' . $row['DateD'] . '</td>';
            echo '<td>' . $row['Motif'] . '</td>';
            echo '<td>' . $row['Trajet'] . '</td>';
            echo '<td>' . $row['Km_parcouru'] . '</td>';
            echo '<td>' . $row['Cout_trajet'] . '</td>';
            echo '<td>' . $row['Peages'] . '</td>';
            echo '<td>' . $row['Repas'] . '</td>';
            echo '<td>' . $row['Hebergement'] . '</td>';
            echo '<td>' . $total . '</td>';
            echo '<td><form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '"><input type="hidden" name="depla" value="' . $row["Iddeplacement"] . '"><input class="BoutonA" type="submit" value="Supprimer"></form></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Aucun résultat trouvé.";
    }
    ?>
    <button class="BoutonA"><a href="FraisDeplacement.php">Ajouter un déplacement</a></button>
</body>
<footer>
    <p>ALLARD Théo, BLANCHARD Théo, HUBERDAUX-Adrien, HADDAD Ryad</p>
</footer>
</html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Style.css">
<?php
$titlepage="Bordereau";
$style="";
$title = "Bordereau";
$soustitle = "sous-titre";
?>

<div class="bordereau">

    <img src="../img/banner.png" class="saut">

    <div class="bordereau-infos">
    <?php

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


<form name="FormBordereau" action="" method="POST">
            <label> Je soussigné(e) </label>
            <input class="saut" type="text" name="" required>
            </br>

            <label> Demeurant </label>
            <input class="saut" type="text" name="" required>
            </br>

            <label> Certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association </label>
            <input class="saut" type="text" name="" required>
            <label> en tant que don. </label>
            </br>


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
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Aucun résultat trouvé.";
    }
    ?>

<label> Je suis licencié sous le n° de licence suivant : </label>
            <input class="saut" type="text" name="" required>
            </br>

            <label> Montant total des dons </label>
            <input class="saut" type="text" name="" required>
            </br>
            
            <label class="saut"> Pour bénéficier du reçu de dons, cette note de frais doit être accompagnée de tous les justificatifs correspondants </label>
            </br>

            <label> Fait à </label>
            <input type="text" name="" required>
            <label> Le </label>
            <input class="saut" type="date" name="" required>
            </br>

            <label> Signature du bénévole: </label>
            </br>
            <textarea readonly class="saut"></textarea>
            </br>

            <img src="../img/footer.png" class="saut">
        </form>

    </div>
    <button class="btnpdf" onclick="hideButton(this), window.print(), showButton(this)">Enregistrer en PDF</button>
</br></br></br>
</div>

<script>
    function hideButton(x)
        {
            x.style.display = 'none';
        }

    function showButton(x)
        {
            x.style.display = 'block';
        }
</script>

<?php
include('..\View\template.php');
?>
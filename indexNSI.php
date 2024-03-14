<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Spécialité NSI</title>
        <link href="../CSS/StyleAccueil.css" rel="stylesheet" type="text/css" />
    <?php
        // Connexion à la base de données
        $servername = 'localhost';
        $username = 'root';
        $password = 'SxdoRDXjkmQ0YJhI';
        $database = 'bezouttravaux';

        // On établit la connexion
        $conn = new mysqli($servername, $username, $password, $database);

        // On vérifie la connexion
        if ($conn->connect_error) {
            die('Erreur : ' . $conn->connect_error);
        }
    ?>
    </head>

    <body>
        <table auto; border="0" width="100%">
            <tr>
                <td width="20%" align="left">
                    <div style="float: left; width: 100%">
                        <a href="http://lyceebezout77.fr/"><img src="Images/Logo.png" width="175" height="175"></a>
                    </div>
                </td>
                <td>
                        <div>
                                <h1 class="NSItitre">Spécialité NSI</h1>
                        </div>
                </td>
                <td width="20%">
                    <div style="float: width 100%" align="center">
                        <a href="indexNSI.php"><img src="Images/NSI.PNG" width="175" height="100"></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div></div>
                </td>
            </tr>
        </table>
        <!--Les boutons-->
        <div>
            <h2><u>Travaux des années:</u></h2>
             <!--Les boutons-->
                <button class="buttonAccueil"><a href="../index.php">Retour à l'accueil principal</a></button>
            <br>
            <br>
        </div>
 <!-- Formulaire pour sélectionner l'année -->
 <form method="POST" action="">
        <label for="annee">Sélectionnez une année</label>
        <select name="annee" id="annee" class="Selection">
            <option value="2020">2020-2021</option>
            <option value="2021">2021-2022</option>
            <option value="2022">2022-2023</option>
            <option value="2023">2023-2024</option>
            <option value="2024">2024-2025</option>
            <!-- copiez-collez la ligne du haut et rajouter la ici si vous voulez rajouter une année -->
        </select>
        <input class="afficher" type="submit" value="Afficher">
    </form>
    <!------------------------------------------->
      <!-- Tableau pour afficher les travaux -->
      <?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['annee'])) {
    // Connexion à la base de données
    $servername = 'localhost';
    $username = 'root';
    $password = 'SxdoRDXjkmQ0YJhI';
    $database = 'bezouttravaux';

    // On établit la connexion
    $conn = new mysqli($servername, $username, $password, $database);

    // On vérifie la connexion
    if ($conn->connect_error) {
        die('Erreur : ' . $conn->connect_error);
    }

    $annee = $conn->real_escape_string($_POST['annee']);
    $req = "SELECT Nom_Eleve, Prenom_Eleve, Lien_Travaux, Titre_Travaux, Image_Travaux
            FROM `travaux`
            INNER JOIN eleve
            ON travaux.IdEleve1 = eleve.IdEleve
            OR travaux.IdEleve2 = eleve.IdEleve
            OR travaux.IdEleve3 = eleve.IdEleve
            OR travaux.IdEleve4 = eleve.IdEleve
            WHERE Annee_Travaux = '$annee'";

    $result = $conn->query($req);

    if ($result) {
        // Commencez le tableau
        echo '<table border="2" style="margin: auto; width: 60%;">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Titre des Travaux</th>
                    <th>Lien des Travaux</th>
                    <th>Image</th>
                </tr>';

        // Utilisation de fetch_object dans une boucle pour récupérer tous les élèves
        while ($row = $result->fetch_object()) {
            // Commencez une nouvelle ligne dans le tableau pour chaque résultat
            echo '<tr>';
            echo '<td>' . $row->Nom_Eleve . '</td>';
            echo '<td>' . $row->Prenom_Eleve . '</td>';
            $titre = $row->Titre_Travaux;
            echo '<td>' . $row->Titre_Travaux . '</td>';
            //Je défini une variable qui va prendre la valeur du champ sélectionné pour pouvoir simplement l'utiliser dans un lien
            $lien = $row->Lien_Travaux;
            echo '<td>' . '<a href="../../Devoirs_Eleves/NSI/' . $titre . '/' . $lien . '"/> ' . $lien . ' </a>' . '</td>';
            //Pareil mais pour l'image
            $image = $row->Image_Travaux;
            echo '<td>' . '<img src="../Devoirs_Eleves/NSI/ImageDevoir/' . $image . '" width="150px" height="150px"/>' . '</td>';
            echo '</tr>';
        }

        // Terminez le tableau
        echo '</table>';
    } else {
        // Gestion des erreurs de requête SQL
        echo "Erreur de requête : " . $conn->error;
    }

    // Libération de la variable et déconnexion
    $result->close();
    $conn->close();
}
?>
        <br>
        <br>
    </body>
    <footer>
        <p> HUBERDAUX-Adrien / 2023-2024 sur une idée originale de Boukhris Camille</p>
    </footer>
</html>
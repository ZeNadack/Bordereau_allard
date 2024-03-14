<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="../CSS/Style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlepage; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style><?php echo $style; ?></style>
</head>
<header>
    <button class="BoutonA"><a href="Accueil.php">Retour à l'accueil principal</a></button>
    <h2 class="Titre">Liste des Frais de Déplacement<h2>
</header>
<br><br><br><br><br><br><br><br>
<body>

<!-- Formulaire d'ajout de frais de déplacement -->
<form method="POST" action="">
    <label for="DateD">Date :</label>
    <input type="text" name="DateD" id="DateD"><br>

    <label for="Motif">Motif :</label>
    <input type="text" name="Motif" id="Motif"><br>

    <label for="Trajet">Trajet :</label>
    <input type="text" name="Trajet" id="Trajet"><br>

    <label for="Km_parcouru">Km parcourus :</label>
    <input type="text" name="Km_parcouru" id="Km_parcouru"><br>

    <label for="hebergement">Hébergement :</label>
    <input type="text" name="hebergement" id="hebergement"><br>

    <label for="Cout_trajet">Coût du trajet :</label>
    <input type="text" name="Cout_trajet" id="Cout_trajet"><br>

    <label for="Peages">Péages :</label>
    <input type="text" name="Peages" id="Peages"><br>

    <label for="Repas">Repas :</label>
    <input type="text" name="Repas" id="Repas"><br>

    <label for="ndelicence">Numéro de licence :</label>
    <input type="text" name="ndelicence" id="ndelicence"><br>

    <button type="submit">Ajouter Frais</button>
    <input type="button" name="btneffacer" value="Effacer" onclick="effacerChamps()">
</form>

<script>
    function effacerChamps() {
        // Sélectionne tous les champs de texte dans le formulaire
        var champsTexte = document.querySelectorAll('input[type="text"]');
        
        // Parcourt chaque champ de texte et remplace son contenu par une chaîne vide
        champsTexte.forEach(function(champ) {
            champ.value = '';
        });
    }
</script>

<?php
$serveur="localhost";
$nom="root";
$motdepasse="SxdoRDXjkmQ0YJhI";
$base="m2lratt";
// Vérifie si le formulaire pour ajouter un frais de déplacement a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DateD']) && isset($_POST['Motif'])) {
    // Connexion à la base de données
    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$base", $nom, $motdepasse);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Préparation de la requête INSERT INTO
        $req = $conn->prepare("INSERT INTO `deplacement` (`DateD`, `Motif`, `Trajet`, `Km_parcouru`, `hebergement`, `Cout_trajet`, `Peages`, `Repas`, `ndelicence`) VALUES (:dateD, :motif, :trajet, :kmparcourus, :dodo, :cout, :peages, :miam, :ndelicence)");
        
        // Liaison des paramètres et exécution de la requête
        $req->bindParam(':dateD', $_POST['DateD']);
        $req->bindParam(':motif', $_POST['Motif']);
        $req->bindParam(':trajet', $_POST['Trajet']);
        $req->bindParam(':kmparcourus', $_POST['Km_parcouru']);
        $req->bindParam(':dodo', $_POST['hebergement']);
        $req->bindParam(':cout', $_POST['Cout_trajet']);
        $req->bindParam(':peages', $_POST['Peages']);
        $req->bindParam(':miam', $_POST['Repas']);
        $req->bindParam(':ndelicence', $_POST['ndelicence']);
        
        $req->execute();

        echo "<p>Les frais de déplacement ont été ajoutés.</p>";
    } catch(PDOException $e) {
        echo "<p>Erreur lors de l'ajout des frais de déplacement: " . $e->getMessage() . "</p>";
    }
}
?>

<form method="GET" action="../Controller/Accueil.php">
    <button type="submit" name="btnaccueil" value="Accueil">Accueil</button>
</form>

<form method="GET" action="">
    <button class="BoutonA"><a href="ListeFrais.php">Vue d'ensemble</a></button>
</form>
</body>
<footer>
    <p>ALLARD Théo, BLANCHARD Théo, HUBERDAUX-Adrien, HADDAD Ryad</p>
</footer>
</html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
$titlepage="Page";
$style="";
$title = "Accueil";
$soustitle = "sous-titre";
ob_start();
?>

<form action = "" method="POST">
Votre email est : <?php echo $_SESSION['mail'] ?>
<button type="submit" name="BtnDeconnexion" value="Deconnexion">Deconnexion</button>
</form>


<label for="assoc">Selectionnez votre/vos associations :</label>

<select name="assoc" id="assoc">
    <?php
    $connect = Connexion();

    $sql = 'SELECT idassociation, nomligue FROM association';

    $resultat = $connect->query($sql);
    while ($association = $resultat->fetch()) {
        echo '<option value="' . $association['idassociation'] . '">' . $association['nomligue'] . '</option>';
    }
    ?>
</select>
<form name="listeajout" action="" method="POST">
    <button type="submit" name="BtnAjoutAssoc" value="Ajout">Ajouter association</button>
</form>

<?php
$content=ob_get_clean();
include('..\View\template.php');
?>
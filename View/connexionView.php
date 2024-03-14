<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
$titlepage="PageConnexion";
$style="";
$title="Connexion";
$soustitle="";
ob_start();
?>


<form action = "" method="POST">
    <label > Mail </label>
    <input type="email" name="mail" required>
    <label >  Mot de Passe </label>
    <input type="password" name="mdp" required><br></br>
    <button type="submit" name="BtnConnexion" value="Connexion">Connecter</button><br></br>
</form>

</br>

<form action = "" method="POST">
    <button type="" name="BtnPasdeCompte" value="NoCompte">Pas de Compte?</button>
</form>

</br>

<?php
$content=ob_get_clean();
include('..\View\templateAccueil.php');
?>
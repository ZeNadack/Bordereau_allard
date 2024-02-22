<?php
    include ('..\Model\Fonctions.php');

    $result = Select('adherent');

    while($line = $result->fetch())
    {
        $hash = password_hash($line['motdepasse'], PASSWORD_BCRYPT);
        $query = ("UPDATE adherent SET motdepasse = '".$hash."' WHERE adressemail = '" .$line['adressemail']."'");
        AutreRequete($query);
    }
?>
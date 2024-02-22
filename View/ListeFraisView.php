<link href="ListeFrais.css" rel="stylesheet">
<?php
$titlepage="Page";
$style="";
$title = "Liste des frais de déplacement";
$soustitle = "";
ob_start();
?>
</br>
<table>
<thead> 
<tr> 
<td>    Motif</td>
<td>    Trajet</td>
<td>    Kms parcourus</td>
<td>    Coût Trajet</td>
<td>    Péages</td>
<td>    Repas</td>
<td>    Hébergement</td>
<td>    Total</td>
</tr>
</thead>
</table>
<form method="post" action="Accueil.php">
    <label>Accueil</label>
    <input type="submit" name="btnaccueil" value="Accueil">
</form
<?php
$content=ob_get_clean();
include('..\View\template.php');
?>
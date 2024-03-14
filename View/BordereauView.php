<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
<?php
$titlepage="Bordereau";
$style="";
$title = "Bordereau";
$soustitle = "sous-titre";
?>

<div class="bordereau-form">

    <img src="../img/banner.png" class="saut">

    <div class="bordereau-infos">
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

            <table class="saut">
                <tr>
                    <th>Motif</th>
                    <th>Trajet</th>
                    <th>Kms parcourus</th>
                    <th>Coût Trajet</th>
                    <th>Péages</th>
                    <th>Repas</th>
                    <th>Hébergement</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                    <td> <input type="text" name="" required> </td>
                </tr>
            </table>

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
            <textarea class="saut"></textarea>
            </br>

            <img src="../img/footer.png" class="saut">
        </form>
    </div>
    <button class="btnpdf" onclick="hideButton(this), window.print(), showButton(this)">Enregistrer en PDF</button>
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
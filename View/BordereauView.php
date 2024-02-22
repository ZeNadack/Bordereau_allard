<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
$titlepage="Bordereau";
$style="";
$title = "Bordereau";
$soustitle = "sous-titre";
ob_start();
?>


<div class="bordereau-form">
    <div class="bordereau-img">
    </div>
    <div class="bordereau-infos">
        <form name="" action="" method="POST">
            <label> Je soussigné(e) </label>
            <input type="text" name="" required>
            </br>
            <label> Demeurant </label>
            <input type="text" name="" required>
            </br>
            <label> Certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association </label>
            <input type="text" name="" required>
        </form>
    </div>
</div>


<?php
$content=ob_get_clean();
include('..\View\template.php');
?>
<?php
function Connexion(){
    $serveur="localhost";
    $nom="root";
    $motdepasse="SxdoRDXjkmQ0YJhI";
    $base="m2lallardblanchardhuberdauxhaddad";
    try
    {
        $connect = new PDO("mysql:host=".$serveur.";dbname=".$base,$nom,$motdepasse);
    } 
    catch (PDOException $e) 
    {
        echo "Impossible de se connecter!".$e ->getMessage();
    }
    return $connect;

}
function Deconnexion($connect)
{
    if($connect)
            $connect=NULL;
}

function Select($table)
{
    $connect=Connexion();

    $result=$connect->query("select * from ".$table);

    Deconnexion($connect);
    return $result;
}

function SelectUnCritere($table, $champ1, $critere1)
{
$connect=Connexion(); 

 $result=$connect->prepare("Select * from ".$table." where ".$champ1." = :critere1") ;

$result->execute(array(':critere1'=>$critere1)); 
Deconnexion($connect);
return $result;
}


function SelectCritere($table,$champ1,$critere1,$champ2,$critere2)
{
    $connect=Connexion();

    $result=$connect->prepare("Select * from ".$table." where ".$champ1."=:critere1"." And ".$champ2."=:critere2");

    $result -> execute(array(':critere1'=>$critere1, ':critere2'=>$critere2));
    Deconnexion($connect);
    return $result;
}

function AutreRequete ($query)
{
$connect=Connexion();
$result = $connect->prepare($query);
$result = $result->execute();
Deconnexion($connect);
return $result;
}

function InsertBindParam($table, $Champ1, $Champ2…)
{
$connect=Connexion();
$result = $connect->prepare('INSERT INTO '. $table .' VALUE (:Champ1, :Champ2,….)');
$result -> bindParam(':Champ1', $Champ1, PDO ::PARAM_STR) ;
$result -> bindParam(':Champ2', $Champ2, PDO ::PARAM_INT) ;
….
$result -> execute();
Deconnexion($connect);
return $result;
}

?>
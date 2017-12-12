<?php
include "Models/Utilisateur.class.php";

$idUsr="";
$loginUsr="";
$mdpsUsr="";
$mailUsr="";

if(isset($_REQUEST['idUsr']))
    $idUsr = $_REQUEST['idUsr'];
if(isset($_REQUEST['loginUsr']))
    $loginUsr = $_REQUEST['loginUsr'];
if(isset($_REQUEST['mdpsUsr']))
    $mdpsUsr = $_REQUEST['mdpsUsr'];
if(isset($_REQUEST['mailUsr']))
    $mailUsr = $_REQUEST['mailUsr'];

$U = new Utilisateur($idUsr,$loginUsr,$mdpsUsr,$mailUsr);

function compareArray($array1,$array2){
    $result = array();
    foreach ($array1 as $a1){
        $test = true;
        foreach ($array2 as $a2){
            if($a1==$a2){
                $test = false;
                break;
            }
        }
        if($test){
            array_push($result,$a1);
        }
    }
    return $result;
}

switch ($action){
    case "logged":
        $id = $_SESSION['usrId'];
        $fav_ads = $bdd->query("SELECT * FROM annonce WHERE idCat IN (SELECT idCat FROM favoris WHERE idUsr = $id)")->fetchAll(PDO::FETCH_OBJ);
        $ads = $bdd->query("SELECT * FROM annonce")->fetchAll(PDO::FETCH_OBJ);
        $a = compareArray($ads,$fav_ads);
        include "Views/Utilisateur/Acceuil.php";
        break;
}
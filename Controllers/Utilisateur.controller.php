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

switch ($action){
    case "logged":
        $cat =
        include "Views/Utilisateur/Acceuil.php";
        break;
}
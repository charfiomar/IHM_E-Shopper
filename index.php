<?php
session_start();
include "Includes/Connexion.php";

$controller = "Acceuil";
$action = "login";


if(isset($_REQUEST['controller'])){
    $controller=$_REQUEST['controller'];
}

if(isset($_REQUEST['action'])){
    $action=$_REQUEST['action'];
}

include "Controllers/".$controller.".controller.php";
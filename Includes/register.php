<?php
require "Connexion.php";
$mails = $bdd->query("SELECT mailUsr FROM utilisateur")->fetchAll(PDO::FETCH_ASSOC);
$usernames = $bdd->query("SELECT loginUsr FROM utilisateur")->fetchAll(PDO::FETCH_ASSOC);

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

function MailCMP($value,$array){
    foreach($array as $item){
        if(strcmp($value,$item['mailUsr'])==0)
            return false;
    }
    return true;
}

function UsernameCMP($value,$array){
    foreach($array as $item){
        if(strcmp($value,$item['loginUsr'])==0)
            return false;
    }
    return true;
}

$m = MailCMP($email,$mails);
$u = UsernameCMP($username,$usernames);

$categories = $_REQUEST['categorie'];

if($m && $u){
    $bdd->exec("INSERT INTO utilisateur(loginUsr,mdpsUsr,mailUsr) VALUES('$username','$password','$email') ");
    $id_us = $bdd->query("SELECT idUsr fROM utilisateur WHERE loginUsr = '$username'")->fetch(PDO::FETCH_OBJ);
    foreach ($categories as $category){
        $bdd->exec("INSERT INTO favoris VALUES ('$id_us->idUsr','$category')");
    }
    unset($_REQUEST['password']);
    unset($password);
    unset($_REQUEST['username']);
    unset($_REQUEST['email']);
    header('location: ../Views/Thankyou.php');
}else{
    $location = "location: ../index.php?controller=Acceuil&action=register";
    if (!$m){
        $location = $location."&mailExists=true";
    }
    if (!$u) {
        $location = $location."&usernameExists=true";
    }
    header($location);
}
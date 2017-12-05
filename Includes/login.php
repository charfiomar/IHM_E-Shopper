<?php
include '../Includes/Connexion.php';

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
unset($_REQUEST['password']);

$conn = $bdd->query("SELECT idUsr FROM utilisateur WHERE loginUsr = '$username' AND mdpsUsr = '$password'")->fetch(PDO::FETCH_OBJ);

unset($password);

if(isset($conn->idUsr)){
    session_start();
    $_SESSION['username']=$username;
    header('location: ../Views/Welcome.php');
}
else
{
    header('location: ../Views/404.php');
}

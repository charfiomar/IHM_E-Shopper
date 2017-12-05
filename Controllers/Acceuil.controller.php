<?php

switch ($action){
    case "login":
        include "Views/login.php";
        break;
    case "register":
        $res = $bdd->query("SELECT * FROM categorie ORDER BY nomCat")->fetchAll(PDO::FETCH_OBJ);
        include "Views/Register.php";
        break;
}
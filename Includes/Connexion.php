<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=mybestdeal;charset=utf8',
        'root', 'Omar180794');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch (PDOException $e){
    echo "<script type='text/javascript'>alert('Connexion BD Impossible');</script>";
}
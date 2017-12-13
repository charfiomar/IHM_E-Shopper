<?php
include "Models/Annonce.class.php";
include "Models/Photo.class.php";

$idAnn="";
$titreAnn="";
$prixAnn="";
$descriptionAnn="";
$dateCreAnn="";
$dateExpAnn="";
$etatAnn="";
$idUsr="";
$idCat="";

if(isset($_REQUEST['idAnn'])){
    $idAnn =$_REQUEST['idAnn'];
}
if(isset($_REQUEST['titreAnn'])){
    $titreAnn =$_REQUEST['titreAnn'];
}
if(isset($_REQUEST['prixAnn'])){
    $prixAnn =$_REQUEST['prixAnn'];
}
if(isset($_REQUEST['descriptionAnn'])){
    $descriptionAnn =$_REQUEST['descriptionAnn'];
}
if(isset($_REQUEST['dateCreAnn'])){
    $dateCreAnn =$_REQUEST['dateCreAnn'];
}
if(isset($_REQUEST['dateExpAnn'])){
    $dateExpAnn =$_REQUEST['dateExpAnn'];
}
if(isset($_REQUEST['etatAnn'])){
    $etatAnn =$_REQUEST['etatAnn'];
}
if(isset($_REQUEST['idUsr'])){
    $idUsr =$_REQUEST['idUsr'];
}
if(isset($_REQUEST['idCat'])){
    $idCat =$_REQUEST['idCat'];
}

$A = new Annonce($idAnn,$titreAnn,$prixAnn,$descriptionAnn,$dateCreAnn,$dateExpAnn,$etatAnn,$idUsr,$idCat);

switch ($action){
    case 'list':
        $res = $A->listUsr_Annonce($bdd,$_SESSION['usrId']);
        include "Views/Annonce/MesAnnonces.php";
        break;
    case 'add':
        include "Views/Annonce/AddAnnonce.php";
        break;
    case 'addAd':
        include "Includes/uploadAd.php";
        header('location:index.php?controller=Annonce&action=list');
        break;
    case 'consult':
        $anId=$_REQUEST['id'];
        $ann = $bdd->query("SELECT * FROM annonce WHERE idAnn = $anId")->fetch(PDO::FETCH_OBJ);
        $recom = $bdd->query("SELECT * FROM annonce WHERE idCat = $ann->idCat")->fetchAll(PDO::FETCH_OBJ);
        $pho = $bdd->query("SELECT nomPh,descPh FROM photo WHERE idAnn =$anId ")->fetch(PDO::FETCH_OBJ);
        $usrnm = $bdd->query("SELECT loginUsr FROM utilisateur WHERE idUsr =$ann->idUsr ")->fetch(PDO::FETCH_OBJ);
        include "Views/Annonce/ViewAnnonce.php";
        header('location:index.php?controller=Annonce&action=list');
        break;
}
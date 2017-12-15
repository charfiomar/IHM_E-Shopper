<?php
$idusrr = $_SESSION['usrId'];
if($bid<$pa+$ua){

    header("location:Views/bidError.php?id=$ia");
}else{

    $bdd->exec("INSERT INTO enchere(sommeEn,idUsr,idAnn) VALUES ($bid,$idusrr,$ia)");
    $bdd->exec("UPDATE annonce SET prixAnn = $bid WHERE idAnn = $ia ");
    header("location:index.php?controller=Annonce&action=consult&id=$ia");

}
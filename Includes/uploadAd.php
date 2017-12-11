<?php

$target_dir = "images/annonces/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["tmp_name"]);
$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
if ($uploadOk == 1){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $imageFileName = substr($_FILES["fileToUpload"]["tmp_name"],4);
    $imageFileDesc = $_REQUEST['titreAnn'];
    $A->add_Annonce($bdd);
    $bdd->exec("INSERT INTO photo(nomPh,descPh,idAnn) VALUES('$imageFileName','$imageFileDesc',".$bdd->lastInsertId().") ");
}
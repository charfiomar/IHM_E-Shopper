<?php
/**
Generated BY DB2PHP By CharfiOmar
 **/
class Utilisateur
{
    private $idUsr,$loginUsr,$mdpsUsr,$mailUsr;

    public function __construct($idUsr,$loginUsr,$mdpsUsr,$mailUsr){
    $this->idUsr = $idUsr;
    $this->loginUsr = $loginUsr;
    $this->mdpsUsr = $mdpsUsr;
    $this->mailUsr = $mailUsr;
    }
    public function add_Utilisateur($bdd){
    $bdd->exec("INSERT INTO utilisateur(loginUsr,mdpsUsr,mailUsr) VALUES('$this->loginUsr','$this->mdpsUsr','$this->mailUsr') ");
    }
    public function list_Utilisateur($bdd){
    $res = $bdd->query("SELECT loginUsr,mdpsUsr,mailUsr FROM utilisateur")->fetchAll(PDO::FETCH_OBJ);
    return $res;
    }
    public function list1_Utilisateur($bdd){
    $res = $bdd->query("SELECT loginUsr,mdpsUsr,mailUsr FROM utilisateur WHERE idUsr ='$this->idUsr' ")->fetch(PDO::FETCH_OBJ);
    return $res;
    }
    public function update_Utilisateur($bdd){
    $bdd->exec("UPDATE utilisateur SET loginUsr = '$this->loginUsr', mdpsUsr = '$this->mdpsUsr', mailUsr = '$this->mailUsr' WHERE idUsr ='$this->idUsr'");
    }
    public function delete_Utilisateur($bdd){
    $bdd->exec("DELETE FROM utilisateur WHERE idUsr ='$this->idUsr' ");
    }
    public function annonces_favories($bdd){
    $res = $bdd->query("")->fetchAll(PDO::FETCH_OBJ);
    return $res;
    }

}
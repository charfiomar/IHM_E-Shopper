<?php
/**
Generated BY DB2PHP By CharfiOmar
 **/
class Enchere
{
    private $idEn,$sommeEn,$idUsr,$idAnn;

    public function __construct($idEn,$sommeEn,$idUsr,$idAnn){
        $this->idEn = $idEn;
        $this->sommeEn = $sommeEn;
        $this->idUsr = $idUsr;
        $this->idAnn = $idAnn;
    }
    public function add_Enchere($bdd){
        $bdd->exec("INSERT INTO enchere(sommeEn,idUsr,idAnn) VALUES('$this->sommeEn','$this->idUsr','$this->idAnn') ");
    }
    public function list_Enchere($bdd){
        $res = $bdd->query("SELECT sommeEn,idUsr,idAnn FROM enchere")->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    public function list1_Enchere($bdd){
        $res = $bdd->query("SELECT sommeEn,idUsr,idAnn FROM enchere WHERE idEn ='$this->idEn' ")->fetch(PDO::FETCH_OBJ);
        return $res;
    }
    public function update_Enchere($bdd){
        $bdd->exec("UPDATE enchere SET sommeEn = '$this->sommeEn', idUsr = '$this->idUsr', idAnn = '$this->idAnn' WHERE idEn ='$this->idEn' ");
    }
    public function delete_Enchere($bdd){
        $bdd->exec("DELETE FROM enchere WHERE idEn ='$this->idEn' ");
    }

}
<?php

function getConnection()
{
    $bdd = new PDO('mysql:host=localhost;dbname=adsysiso_light', 'root', '');
    //$retour["Success"] = true;
    $retour["Message_connexion"] = "Connexion reussie";
    return $bdd;
}    

function getKey($cle)
{
    //recupere les donnees du call_box
    $reqcle = getConnection()->query("SELECT count(*) as `row` FROM cle_api WHERE 
    cle='$cle'");
  
    $reqcle->execute();
    $res=$reqcle->fetch();
    return $res;
    //$retour["resultat"] = $resultatcle;

}

    ?>
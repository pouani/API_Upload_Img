<?php
   //include("connexion.php");
   require_once 'connexion.php';
   echo "ici";

   if(isset($_POST['name']) && isset($_FILES['nom_fichier']['name'])){

    //recuperation de ladresse ip du serveur
    $adresse_ip_serveur=gethostbyname(gethostname());

   //recuperation des informations du fichier envoye
    $info_fichier=pathinfo($_FILES['nom_fichier']['name']);
    $nom_fichier=$info_fichier['basename'];//nom du fichier envoye
    $extension_fichier=$info_fichier['extension'];//extension du fichier

    //chemin complet du dossier de stockage
    $mon_dossier_image='img/'.$nom_fichier;

    //transfert du fichier du repertoire temporaire vers le repertoire de stockage
    move_uploaded_file($_FILES['nom_fichier']['tmp_name'],$mon_dossier_image);

    //requette dinsertion des donnees dans la base
    $req = ("INSERT INTO photo_test(nom_photo, url_photo)VALUE(?,?)");

    //adresse complette de telechargement du fichier sur le serveur
    $url = 'http://' . $adresse_ip_serveur . '/img/' . $nom_fichier;

    //nom de limage fourni par lutilisateur
    $fichier = $_POST['name'];
    

    if($sql=getconnection()->prepare($req))

        $query = $sql->execute(array($fichier, $url));

        die("exécution des données");
   }
?>
<?php
require 'config.php';
if(isset($_SESSION['id_gerente'])){

    $id_gerente = $_SESSION['id_gerente'] ;
}

// require "dabase.php";
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['submit'])){
    $title = $_POST['titre'];
    $nom_auteur = $_POST['nom_auteur'];
    $image_cover = $_POST['image_cover'];
    $etat = $_POST['etat'];
    $type = $_POST['type'];
    $date_edition = $_POST['date_edition'];
    $date_achat = $_POST['date_achat'];
    $nombre_page = $_POST['nombre_page'];

    // mysql pour insérer des données
   $query = "INSERT INTO ouvrages(`id_gerente`, `titre`, `nom_auteur`, `image_cover`, `etat`, `type`, `date_edition`, `date_achat`, `nombre_pages`)
   VALUES('$id_gerente' , '$title', '$nom_auteur' ,'pic/$image_cover', '$etat', '$type', '$date_edition', '$date_achat' ,'$nombre_page')";
     $result = mysqli_query($conn,$query);
       // vérifier 
                    
       if($result)
       {
            header("Location: admin.php");
           echo 'Données insérées';
       }
   
       else{
           echo 'Données non insérées';
       }
       mysqli_close($conn);
      
   }



?>
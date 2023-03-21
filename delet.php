<?php
require 'config.php';
$idDelet=$_POST["idDelet"];
    $con = mysqli_connect('localhost', 'root', '', 'biblio');
    $sql="DELETE FROM ouvrages WHERE id_ouvrage = '$idDelet'";
    if(mysqli_query( $con,$sql)){
        header("location:admin.php");
      
    }




?>
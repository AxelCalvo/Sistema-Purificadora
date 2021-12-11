<?php

include("../conexion.php");
$con=conectar();

$Id=$_GET['id'];

$sql="DELETE FROM garrafon WHERE Id_Garrafon='$Id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:garrafon.php");
    }
?>

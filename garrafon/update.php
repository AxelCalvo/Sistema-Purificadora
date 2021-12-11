<?php

include("../conexion.php");
$con=conectar();

$Id_G=$_POST['Id_Garrafon'];
$costo=$_POST['costo'];
$precio=$_POST['precio_venta'];
$color=$_POST['color'];
$caducidad=$_POST['caducidad'];
$cantidad=$_POST['cantidad'];


$sql="UPDATE garrafon SET  costo='$costo',precio_venta='$precio',color='$color',caducidad='$caducidad', cantidad='$cantidad' WHERE Id_Garrafon='$Id_G'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location:garrafon.php");
    }
?>
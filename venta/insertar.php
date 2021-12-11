<?php
include("../conexion.php");
$con=conectar();
$fecha=$_POST['fecha'];
$cantidad=$_POST['cantidad'];
$id_g=$_POST['id_g'];
$id_e=$_POST['id_e'];
$id_c=$_POST['id_c'];
$total=$_POST['importe_total'];




$sql="INSERT INTO venta VALUES(default,'$fecha','$cantidad','$id_g','$id_e','$id_c','$total')";

$query= mysqli_query($con,$sql);


if($query){
    Header("Location: venta.php");
    
}else {
    
}
?>
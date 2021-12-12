<?php
include("../conexion.php");
$con=conectar();
$fecha=$_POST['fecha'];
$cantidad=$_POST['cantidad'];
$id_g=$_POST['id_g'];
$id_e=$_POST['id_e'];
$id_c=$_POST['id_c'];
$total=$_POST['importe_total'];

$formatoFecha = date('d/m/Y', strtotime($fecha));

$sql="INSERT INTO venta VALUES(default,'$formatoFecha','$cantidad','$id_g','$id_e','$id_c','$total')";

//apartado garrafon vendido
$garrafones = "SELECT * FROM garrafon";

$garrafon = mysqli_query($con,$garrafones);
while($vendido = mysqli_fetch_assoc($garrafon)){
  if($vendido['Id_Garrafon'] == $id_g) {
    $resta = $vendido['cantidad'] - $cantidad; 
    $restaGarrafon="UPDATE garrafon SET  cantidad='$resta' WHERE Id_Garrafon='$id_g'";
    $consulta = mysqli_query($con,$restaGarrafon);
  }
}
$query= mysqli_query($con,$sql);


if($query)
    Header("Location: venta.php");
else echo "Ocurrio un error";    
?>

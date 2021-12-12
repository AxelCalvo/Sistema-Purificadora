<?php 
ob_start();
include "../conexion.php";
$con = conectar();  
    $id=$_GET['id'];
    $sql="SELECT * FROM venta WHERE folio='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

    $consulta="SELECT *  FROM garrafon";
    $qy=mysqli_query($con,$consulta);

    $consulta2="SELECT *  FROM empleado";
    $qy2=mysqli_query($con,$consulta2);

    $consulta3="SELECT *  FROM cliente";
    $qy3=mysqli_query($con,$consulta3);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ticket Venta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_m.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>

            <div class="container mt-5">
                    <div class="row"> 
                        <div class="col-md-3">
                            <h1>Ticket</h1>
                                <form action="#">
                    
                                <input type="text" class="form-control mb-3" name="fecha" value="<?php echo $row['fecha']; ?>"> 
                                <input type="number" class="form-control mb-3" min="0" name="cantidad" value="<?php echo $row['cantidad']; ?>">
                                    <input  type="text" class="form-control mb-3" name="id_g" value="<?php echo $row['Id_Garrafon']; ?>">
                                    <input  type="text" class="form-control mb-3" name="id_e" value="<?php echo $row['Id_Empleado']; ?>">
                                    <input  type="text" class="form-control mb-3" name="id_c" value="<?php echo $row['Id_Cliente']; ?>">
                                    
                                    <input type="text" class="form-control mb-3" name="importe_total" value="<?php echo $row['importe_total']; ?>">
                                </form>

                        </div>
              </div>
          </div>
    </body>
</html>
<?php 
$html = ob_get_clean();
//echo $html;
require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml("Contenido PDF");
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream();
?>

<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM garrafon WHERE Id_Garrafon='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="Id_Garrafon" value="<?php echo $row['Id_Garrafon']  ?>">
                                <input type="text" class="form-control mb-3" name="costo" placeholder="Costo" value="<?php echo $row['costo']  ?>">
                                <input type="text" class="form-control mb-3" name="precio_venta" placeholder="precio_venta" value="<?php echo $row['precio_venta']  ?>">
                                <input type="text" class="form-control mb-3" name="color" placeholder="Color" value="<?php echo $row['color']  ?>">
                                <input type="text" class="form-control mb-3" name="caducidad" placeholder="Caducidad" value="<?php echo $row['caducidad']  ?>">
                                <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']  ?>">
                               
                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>
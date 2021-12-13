<?php 
    include '../session.php';
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM garrafon";
    $query=mysqli_query($con,$sql);
   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Garrofones</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../style_m.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
    <nav>
			<ul>
			<li><a href="../menu.php">Inicio</a></li>
      <li><a href="../venta/venta.php">Ventas</a></li>
        <?php if($_SESSION['rol'] == 1) { ?>
        <li><a href="../empleado/empleado.php">Empleados</a></li> <?php } ?>
				<li><a href="../cliente/cliente.php">Clientes</a></li>
				<li><a href="garrafon.php">Garrafones</a></li>
				<li><a href="#">Bienvenido, <?php echo $_SESSION['nombre']; ?></a>
				<div>

					<ul>
						<li class="titulo"><a href="../logout.php">Cerrar Sesión</a></li>
					</ul>
			
				</div>
            </li>
			</ul>
		</nav>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">

                                <a>Costo</a>
                                    <input type="text" class="form-control mb-3" name="costo" placeholder="Costo">
                                <a>Precio</a>  
                                    <input type="text" class="form-control mb-3" name="precio_venta" placeholder="Precio Venta">
                                <a>Color</a>
                                    <input type="text" class="form-control mb-3" name="color" placeholder="Color">
                                <a>Fecha Caducidad</a>
                                <input type="text" class="form-control mb-3" name="caducidad" placeholder="Dia/Mes/Año">
                                <a>Cantidad</a>
                                <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad">
                                
                                <input type="submit" class="btn btn-primary">
                                   
                                </form>

                        </div>

                        

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                    <th>ID_Garrafon</th>
                                        <th>Costo</th>
                                        <th>Precio Venta</th>
                                        <th>Color</th>
                                        <th>Caducidad</th>
                                        <th>Cantidad</th>
                                        <th>Operaciones</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                            <th><?php  echo $row['Id_Garrafon']?></th>
                                                <th><?php  echo $row['costo']?></th>
                                                <th><?php  echo $row['precio_venta']?></th>
                                                <th><?php  echo $row['color']?></th>
                                                <th><?php  echo $row['caducidad']?></th>  
                                                <th><?php  echo $row['cantidad']?></th>  
                                                <th><a href="actualizar.php?id=<?php echo $row['Id_Garrafon'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['Id_Garrafon'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>

<?php
    include '../config/conexion.php';    
    include '../config/verif_session.php'; 
    include '../config/head.php'; 
?>

<body id="home">
    
<?php include '../config/header.php'; ?>

        <section id="services" >
        <div class="container">

        <h1 class="text-center">Listado de Clientes</h1>
        <a class="btn btn-primary" href="agregar.php" role="button">Agregar Cliente</a>
        <div class="container">
            <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Sexo</th>
                        <th>Domicilio</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Datos</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
            <?php
                //aca hacer el listado de clientes
                require_once('../config/conexion.php');

                $sql="SELECT * FROM clientes";
                $result = $scon->query($sql);

            ?>

            <tr>
                <?php
                    while($datos=mysqli_fetch_row($result)):
                ?>

                <!-- Listado -->
                        <td><?php echo $datos[0]; ?></td>
                        <td><?php echo $datos[1]; ?></td>
                        <td><?php echo $datos[2]; ?></td>
                        <td><?php echo $datos[3]; ?></td>
                        <td><?php echo $datos[4]; ?></td>
                        <td><?php echo $datos[5]; ?></td>
                        <td><?php echo $datos[6]; ?></td>
                        <td><?php echo $datos[7]; ?></td>
                        <td><?php echo $datos[8]; ?></td>
                        <td></td>
                        <td><a class="btn btn-warning" href="eliminar.php?id=<?php echo $datos[0]; ?>">Eliminar</a></td>

                <?php
                    endwhile;
                ?>
            </tr>

        </table>
        </div>
        </div><!--/.container-->
        </section><!--/#services-->

</body>
<?php include '../config/footer.php'; ?>
</html>

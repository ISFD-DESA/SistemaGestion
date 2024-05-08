<?php
    include '../config/conexion.php';    
        include '../config/verif_session.php'; 
    include '../config/head.php'; 
?>

<body id="home">
    
<?php include '../config/header.php'; ?>

        <section id="services" >
        <div class="container">

        <h1 class="text-center">Listado de Clientes Test</h1>
        <a class="btn btn-primary" href="agregar.php" role="button">Agregar Cliente</a>
        <div class="container">
            <table class="table table-light">
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
            $sql = "SELECT * FROM clientes";
            $resultado = mysqli_query($scon, $sql);

            if (!$resultado) {
                die('Error al consultar la base de datos: ' . mysqli_error($scon));
            }

            // Luego, utiliza un bucle para recorrer los resultados y completar las filas de la tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id_cliente'] . "</td>";
                echo "<td>" . $fila['apellido'] . "</td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['dni'] . "</td>";
                echo "<td>" . $fila['sexo'] . "</td>";
                echo "<td>" . $fila['domicilio'] . "</td>";
                echo "<td>" . $fila['telefono'] . "</td>";
                echo "<td>" . $fila['correo'] . "</td>";
                echo "<td>" . $fila['datos_importantes'] . "</td>";
                echo "<td> <a href='editar.php?id=" . $fila['id_cliente'] . "'> <img src='../iconos/editar.png' width='20'></a> </td>";
                echo "<td> <a href='eliminar.php?id=" . $fila['id_cliente'] . "' onclick='return confirmarEliminar()'> <img src='../iconos/eliminar.png' width='30'></a> </td>";
                echo "</tr>";
            }

            mysqli_free_result($resultado);

            mysqli_close($scon);
            ?>
        </table>
        </div>
        </div><!--/.container-->
        </section><!--/#services-->

    <script>
        function confirmarEliminar() {
            return confirm("¿Estás seguro de que deseas eliminar este plan?");
        }
    </script>
</body>
<?php include '../config/footer.php'; ?>
</html> 

<?php
include '../config/conexion.php';   

// Verificamos si se ha enviado un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consultamos los datos del producto con el ID proporcionado
    $sql = "SELECT * FROM clientes WHERE id_cliente = $id";
    $resultado = mysqli_query($scon, $sql);

    if (!$resultado) {
        die('Error al consultar la base de datos: ' . mysqli_error($scon));
    }

    // Verificamos si se encontraron resultados
    if ($fila = mysqli_fetch_assoc($resultado)) {
        // Mostramos el formulario de edición con los datos del producto
        ?>

<?php     include '../config/verif_session.php'; 
    include '../config/head.php'; ?>

<body id="home">
    
<?php include '../config/header.php'; ?>

    <section id="services" >
        <div class="container">

            <div class="section-header">

            <h1 class="text-center">Modificar Cliente Test</h1>
            <div class="container">
                <form method="post" action="actualizar_clientes.php">
                    <input type="hidden" name="id" value="<?php echo $fila['id_cliente']; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $fila['apellido']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $fila['dni']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Sexo:</label>
                        <input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo $fila['sexo']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Domicilio:</label>
                        <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo $fila['domicilio']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $fila['telefono']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Correo:</label>
                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $fila['correo']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Datos:</label>
                        <input type="text" class="form-control" id="datos" name="datos" value="<?php echo $fila['datos_importantes']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->
    
        </body>
        <?php include '../config/footer.php'; ?>
        </html>
        <?php
    } else {
        echo "No se encontró el producto con el ID proporcionado.";
    }

    mysqli_free_result($resultado);
} else {
    echo "ID no válido.";
}

mysqli_close($scon);
?>

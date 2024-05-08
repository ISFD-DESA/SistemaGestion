<?php
include '../config/conexion.php'; 

// Verificamos si se ha enviado un formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos los datos del formulario
   
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $sexo = $_POST['sexo'];
    $domicilio = $_POST['domicilio'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $datos_importantes = $_POST['datos'];

    // Insertamos un nuevo producto en la base de datos
    $sql = "INSERT INTO clientes (apellido, nombre, dni, sexo, domicilio, telefono, correo, datos_importantes) 
    VALUES ('$apellido', '$nombre', $dni, '$sexo', '$domicilio', '$telefono', '$correo', '$datos_importantes')";

    if (mysqli_query($scon, $sql)) {
        echo "<script>alert('Cliente agregado exitosamente'); window.location='clientes.php';</script>";
        exit(); // Asegura que no se ejecute más código después de la redirección
    } else {
        echo "Error al agregar el cliente: " . mysqli_error($scon);
    }
}

mysqli_close($scon);
?>

<?php     include '../config/verif_session.php'; 
    include '../config/head.php'; ?>

<body id="home">
    
<?php include '../config/header.php'; ?>

    <section id="services" >
        <div class="container">

            <div class="section-header">

            <h1 class="text-center">Agregar Cliente</h1>
                <div class="container">
                    <form method="post" action="agregar.php">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">DNI:</label>
                            <input type="text" class="form-control" id="dni" name="dni" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Sexo:</label>
                            <input type="text" class="form-control" id="sexo" name="sexo" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Domicilio:</label>
                            <input type="text" class="form-control" id="domicilio" name="domicilio" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Correo:</label>
                            <input type="text" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Datos:</label>
                            <input type="text" class="form-control" id="datos" name="datos" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                    </form>
                </div>
                </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->

</body>
<?php include '../config/footer.php'; ?>
</html>
